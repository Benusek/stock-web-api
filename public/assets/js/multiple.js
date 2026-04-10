let productIndex = 0;
const products = document.getElementById('products');

function addProduct() {
    if (productIndex < 12) {
        const template = document.getElementById('product-template').innerHTML;
        const html = template.replaceAll('INDEX', productIndex);
        products.insertAdjacentHTML('beforeend', html);
        productIndex++;
    }
}

function removeProduct() {
    if (productIndex > 1) {
        products.lastElementChild.remove()
        productIndex--;
    }
}

addProduct();
