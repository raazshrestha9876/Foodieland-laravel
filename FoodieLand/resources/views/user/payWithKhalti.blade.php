<!-- extend user layouts main file -->
@extends('user.layout.main')
@section('content')

<div class="button-item section-m1">
    <button id="payment-button" class="hero-btn" >Pay with Khalti</button>
</div>


<script>
    var config = {
        // replace the publicKey with yours
        "publicKey": "test_public_key_c04c30f5b52d433a8e659fedebed65c4",
        "productIdentity": "1234567890",
        "productName": "Dragon",
        "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
        "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
        ],
        "eventHandler": {
            onSuccess(payload) {
                // hit merchant api for initiating verfication
                console.log(payload);
                var url = '/update-order/'+`{{$order_id}}`
                window.location.replace(url)
            },
            onError(error) {
                console.log(error);
            },
            onClose() {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function() {
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({
            amount: `{{$total_price}}` * 100
        });
    }
</script>

@endsection