(function (window) {
    const currency_request = window.currency_request || {};

    const buy_eur = document.querySelector(".buy_eur"),
        sale_eur = document.querySelector(".sale_eur"),
        buy_usd = document.querySelector(".buy_usd"),
        sale_usd = document.querySelector(".sale_usd"),
        date = document.querySelector(".date"),
        status = document.querySelector(".status");

    let data_to_send = {
        "ccy_type_usd": "USD",
        "ccy_type_eur": "EUR",
        "buy_usd": "",
        "buy_eur": "",
        "sale_usd": "",
        "sale_eur": "",
        "bank": "PrivatBank"
    },

        API_url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5",
        app_url = "currencies/save";

    date.textContent = new Date().toDateString();


    currency_request.fetch_currencies = function () {
        fetch(API_url)
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                }
            })
            .then(function (data) {
                buy_usd.textContent = data_to_send.buy_usd = data[0].buy;
                buy_eur.textContent = data_to_send.buy_eur = data[1].buy;
                sale_usd.textContent = data_to_send.sale_usd = data[0].sale;
                sale_eur.textContent = data_to_send.sale_eur = data[1].sale;
                return data_to_send;
            })

            /**** Saving currencies to the DB each 10 min (using recursive timeout) ****/
            .then(function (data_to_send) {
                let timerId = setTimeout(function request() {
                    const formData = new FormData();
                    for (let prop of Object.keys(data_to_send)) {
                        formData.append(prop, data_to_send[prop]);
                    };

                    const fetchInit = {
                        method: 'POST',
                        body: formData
                    };

                    fetch(app_url, fetchInit)
                        .then(function (response) {
                            if (response.ok) {
                                console.log("response ok");
                                status.textContent = "Data saved";
                                setTimeout(() => status.remove(), 2000);
                            } else {
                                console.log(response.statusText);
                            }
                        });

                    setTimeout(request, 5000);
                }, 5000)

            })
            /****  ****/
            .catch(function (error) {
                console.log('There has been a problem with fetching/sending data: ' + error.message);
            })
    };


    currency_request.fetch_currencies();

    window.currency_request = currency_request.fetch_currencies;
}(window));