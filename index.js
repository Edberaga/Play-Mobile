//To disable user to write the input number to outreach the min and max.
window.onload = () => {
    //add event listener to prevent the default behavior
    const number_input_only = document.getElementById("only-number-input");
    number_input_only.addEventListener("keypress", (event) => {
      event.preventDefault();
    });
}

var sub_total_number = 0;
var cart_price = document.getElementsByClassName('cart_price');
var cart_qty = document.getElementsByClassName('cart_qty');
var cart_total = document.getElementsByClassName('cart_total');
var sub_total = document.getElementById('sub_total');

function subTotal() {
    sub_total_number = 0;
    //the length property will return the number of elements in during the loop.
    for (i = 0; i < cart_price.length; i++) 
    {
        //The calculation is whenever the [i] changes. like for example:
        /*
        [0] price 520   qty 1   total 520 * 1 = 520
        [1] price 520   qty 2   total 520 * 2 = 1040
        [2] price 520   qty 9   total 520 * 9 = 4680,
        */
        var calculation = (cart_price[i].value) * (cart_qty[i].value);

        //for each time changing the quantity, display the calculation at the <th>Total</th>.
        cart_total[i].innerText = calculation;

        //for each time changing the quantity, the sub_total will get calculate at this for loop.
        sub_total_number = sub_total_number + calculation;
    }
    //display it at the sub Total section.
    sub_total.innerText = sub_total_number;
}
subTotal();