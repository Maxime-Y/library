window.onscroll = function() {
    var scroll = document.documentElement.scrollTop || document.body.scrollTop;
    var button = document.getElementById('return-to-top');
    if (scroll > 100) { 
        button.style.display = 'block'; 
    } else {
        button.style.display = 'none'; 
    }
};

document.getElementById('return-to-top').onclick = function() {
    window.scrollTo({top: 0, behavior: 'smooth'}); 
};


document.addEventListener('DOMContentLoaded', function() {
    updateCart();
});

function updateCart() {
    const cartItems = [
        { id: 1, title: "Naruto", available: "Disponible", duration: "2 semaines" },
        { id: 2, title: "One Piece", available: "Disponible", duration: "1 semaine" },
        { id: 3, title: "Bleach", available: "Disponible", duration: "3 semaines" }
    ];

    let itemsContainer = document.getElementById('cart-items');
    itemsContainer.innerHTML = '';

    cartItems.forEach((item, index) => {
        let row = `<tr>
            <th scope="row">${index + 1}</th>
            <td>${item.title}</td>
            <td>${item.available}</td>
            <td>${item.duration}</td>
            <td><button class="btn btn-danger btn-sm" onclick="removeItem(${item.id})">Retirer</button></td>
        </tr>`;
        itemsContainer.innerHTML += row;
    });
}

function removeItem(itemId) {
    console.log('Remove item: ', itemId);
    // Logic to remove the item from the cart
    updateCart();
}

function confirmEmprunt() {
    console.log('Emprunt confirmed');
    // Logic to confirm the loan
}
