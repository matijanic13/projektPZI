let allTotal = 0;

function addToCart(element) {
 
    let mainEl = element.closest('.single-item');
    let price = mainEl.querySelector('.price').innerText;
    let name = mainEl.querySelector('h3').innerText;
    let quantity = mainEl.querySelector('input').value;
    let cartItems = document.querySelector('.cart-items');

    if(parseInt(quantity) > 0) {
        price = price.substring(0);
        price = parseInt(price);
        let total = price * parseInt(quantity);

        allTotal += total
        cartItems.innerHTML += `<div class="cart-single-item">
                                <h3> ${name} </h3>
                                <p>${price}KM x ${quantity} = <span>${total}</span>KM</p>
                                <button onclick="removeFromCart(this)" class="remove-item">Ukloni</button>
                                </div>`;

        document.querySelector('.total').innerText = `Total: ${allTotal}KM`;







        element.innerText = 'Dodato';
        element.setAttribute('disable', 'true');

    } else {
        alert('Odaberi količinu')
    }


}

function removeFromCart(dugme) {
    let mainEl = dugme.closest('.cart-single-item');
    let price = mainEl.querySelector('p span').innerText;
    let name = mainEl.querySelector('h3').innerText 
    let artikli = document.querySelectorAll('.single-item');

    price = parseInt(price);
    allTotal -= price;
    document.querySelector('.total').innerText = `Total: ${allTotal}KM`;
    mainEl.remove();

    artikli.forEach(function(art) {
        let itemName = art.querySelector('.si-content').innerText;
        
        if(itemName = name) {
            art.querySelector('.actions input').value = 0;
            art.querySelector('.actions button').removeAttribute('disable');
            art.querySelector('.actions button').innerText = 'Dodaj';
        }
    })
}
