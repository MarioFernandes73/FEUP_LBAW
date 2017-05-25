function paypalfunc() {

        $(".paypal-button-container").each(function(i,obj){
            alert(obj.innerHTML);
            });


    // Render the PayPal button
/*
    paypal.Button.render({





        // Set your environment

        env: 'sandbox', // sandbox | production

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AfF6OuHm8QffQOErpDwI_FNyvBX0EEq8NdXWPt7nAoes4nSX1QC-neq-idsqe-_F-s5NWwwd8qvis5Mi',
            production: '<insert production client id>'
        },

        //'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',       //default token

        // Set to 'Pay Now'

        commit: true,

        // Wait for the PayPal button to be clicked

        payment: function(actions) {

            // Make a client-side call to the REST api to create the payment

            return actions.payment.create({
                transactions: [
                    {
                        amount: { total: 1, currency: 'EUR' }
                    }
                ]
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {

            // Execute the payment

            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');
            });
        }

    }, '#paypal-button-container');*/
}