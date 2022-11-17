const idInput = document.getElementById("idInput");
const nameInput = document.getElementById("instrumentName");
const categoryInput = document.getElementById("selectBox");
const brandInput = document.getElementById("instrumentBrand");
const priceInput = document.getElementById("instrumentPrice");
const quantityInput = document.getElementById("instrumentQuantity");
const descInput = document.getElementById("instrumentDescription");
console.log(idInput);
console.log(nameInput);
console.log(categoryInput);
console.log(brandInput);
console.log(priceInput);
console.log(quantityInput);
console.log(descInput);
function update(id){
    const instrumentId = document.getElementById(`instrument-${id}`);
    console.log(instrumentId);
    const instrumentName = instrumentId.querySelector(`#instrument-name`).getAttribute("data-name");
    const instrumentBrand = instrumentId.querySelector("#brand").getAttribute("data-brand");
    const instrumentCategory = instrumentId.querySelector("#category").getAttribute("data-category");
    const instrumentPrice = instrumentId.querySelector("#price").getAttribute("data-price");
    const instrumentQuantity = instrumentId.querySelector("#quantity").getAttribute("data-quantity");
    const instrumentDesc = instrumentId.querySelector("#desc").getAttribute("data-quantity");

    


    idInput.value = id;
    nameInput.value = instrumentName;
    categoryInput.value = instrumentCategory;
    brandInput.value = instrumentBrand;
    priceInput.value = instrumentPrice;
    quantityInput.value = instrumentQuantity;
    descInput.value = instrumentDesc

}
