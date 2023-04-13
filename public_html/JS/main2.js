//  object to store product-specific properties
const productProperties={
    common: [
        {name: "sku",label: "SKU",id: "sku",placeholder: "#Sku"},
        {name: "price",label: "Price",id: "price",placeholder: "#Price"},
        {name: "name",label: "Name",id: "name",placeholder: "#Name"},
    ],
    book: [
        {
            name: "weight",
            label: "Weight (kg):",
            id: "weight",
            placeholder: "#weight",
            unit: "Kilogram(Kg)"
        },
    ],
    dvd: [{
        name: "size",label: "Size  (MB):",id: "dvd",placeholder: "#size",
        unit: "Megabyte(MB)"
    }],
    furniture: [
        {
            name: "height",
            label: "Height (cm):",
            id: "height",
            placeholder: "#height",
            unit: "Cm"
        },
        {
            name: "width",label: "Width (cm):",id: "width",placeholder: "#width",
            unit: "Cm"
        },
        {
            name: "length",
            label: "Length (cm):",
            id: "length",
            placeholder: "#length",
            unit: "Cm"
        },
    ],
};

// Get the form and dynamic fields container
const myForm=document.getElementById("productForm");
const dynamicFields=document.getElementById("detailsSection");

// Listen for changes to the product type select input
document.getElementById("product_type").addEventListener("change",() => {
    // Remove any existing dynamic fields
    detailsSection.innerHTML="";

    // Get the selected product type and its required fields
    const productType=myForm.product_type.value;
    const requiredFields=productProperties[productType];


    // Add the required fields as dynamic inputs
    requiredFields.forEach((field) => {
        const input=document.createElement("input");
        const label=document.createElement("label");
        const span=document.createElement("span");
        label.textContent=field.label;
        span.textContent=`**please provide ${field.name} in ${field.unit}**`;

        // Get a reference to the span element
        input.type="number";
        input.name=field.name;

        input.placeholder=`${field.placeholder}`;
        input.classList.add("form-control-sm");
        input.className="dynamicInput";
        label.className="dynamicLabel";
        span.className="reminder";

        // Add the input element to the dynamic fields container

        detailsSection.appendChild(label);
        detailsSection.appendChild(input);
        detailsSection.appendChild(span);
    });

});

myForm.addEventListener("submit",(event) => {
    //validate a type switcher dropdown
    var dropdown=document.getElementsByName("product_type")[0];
    if(dropdown.value==="") {
        event.preventDefault();
        var typeError=document.getElementById("type-error");

        typeError.innerHTML="* Please select product type";

        // return true;
    }


    // Track if any fields are missing
    const productType=myForm.product_type.value;
    const requiredFields=productProperties["common"];
    const productTypeFields=productProperties[productType];

    let filter=productProperties["common"];

    if(productType) {
        //  filter.length=0;
        filter=(requiredFields.concat(productTypeFields));

        console.log("filter",filter);
    }
    //console.log("pushed",requiredFields);






    //console.log("pushed",(requiredFields.push(productTypeFields)));

    let missingFields=false;
    //console.log("requiredFields",requiredFields);
    console.log("filter",filter);

    //looping through the required fields of each products
    filter.forEach((field) => {
        const input=myForm[field.name];
        console.log("input.value",input.value);
        var invalidChar=/[^A-Za-z0-9]/;

        if(!input.value) {

            event.preventDefault();
            const errorDiv=input.nextElementSibling;

            const errorMessage=`*${field.name} is required!*`;
            if(!errorDiv||!errorDiv.classList.contains('invalid-feedback')) {

                input.insertAdjacentHTML('afterend',`<div class="invalid-feedback">${errorMessage}</div>`);
            }
            input.classList.add("is-invalid");
            missingFields=true;
            event.preventDefault();
        }
        else if(input.value) {
            if(invalidChar.test(input.value)) {
                event.preventDefault();
                const errorDiv=input.nextElementSibling;
                errorDiv.remove();
                const errorMessage=`*${field.name} contains invalid characters!*`;
                input.insertAdjacentHTML(
                    "afterend",
                    `<div class="invalid-feedback">${errorMessage}</div>`
                );
                input.classList.add("is-invalid");
                missingFields=true;
            }
            else {
                const errorDiv=input.nextElementSibling;
                if(errorDiv&&errorDiv.classList.contains('invalid-feedback')) {
                    errorDiv.remove();
                }
                input.classList.remove('is-invalid');
            }
        }



    });
    if(missingFields) {
        event.preventDefault();
        const firstError=document.querySelector(".is-invalid");
        if(firstError) {
            firstError.scrollIntoView({behavior: "smooth",block: "center"});
        }
    }
});
// Type switcher event listener which clears the error message  when product type is selected
var dropdown=document.getElementsByName("product_type")[0];

dropdown.addEventListener("change",function() {
    var error=document.getElementById("type-error");
    error.innerHTML="";
});

var dropdown=document.getElementsByName("product_type")[0];

dropdown.addEventListener("change",function() {
    filter.length=0;

});
