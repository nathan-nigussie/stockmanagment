
//  object to store product-specific properties
const productProperties={

   book: [
      {name: 'weight',label: 'Weight (kg):',id: 'weight',placeholder: '#weight'},

   ],
   dvd: [{name: 'size',label: 'Size (MB):',id: 'dvd',placeholder: '#size'}],
   furniture: [
      {name: 'height',label: 'Height (cm):',id: 'height',placeholder: '#height'},
      {name: 'width',label: 'Width (cm):',id: 'width',placeholder: '#width'},
      {name: 'length',label: 'Length (cm):',id: 'length',placeholder: '#length'}
   ],
};

// Get the form and dynamic fields container
const myForm=document.getElementById('productForm');
const dynamicFields=document.getElementById('detailsSection');

// Listen for changes to the product type select input
document.getElementById('product_type').addEventListener('change',() => {
   // Remove any existing dynamic fields
   detailsSection.innerHTML='';

   // Get the selected product type and its required fields
   const productType=myForm.product_type.value;
   const requiredFields=productProperties[productType];


   // Add the required fields as dynamic inputs
   requiredFields.forEach((field) => {
      // Create a new input element
      const input=document.createElement('input');
      const label=document.createElement('label');
      const inputWrapper=document.createElement('div');
      label.textContent=field.label;
      // Get a reference to the span element
      input.type='number';
      input.name=field.name;

      input.placeholder=`${field.placeholder}`;
      input.classList.add('form-control-sm');
      label.classList.add();
      // Add the input element to the dynamic fields container

      detailsSection.appendChild(label);
      detailsSection.appendChild(input);

   });
});

// Submit handler for the form
myForm.addEventListener('submit',(event) => {
   // Get the selected product type and its required fields
   const productType=myForm.product_type.value;
   const requiredFields=productProperties[productType];

   // Track if any fields are missing
   let missingFields=false;

   // Loop through the required fields and check if they have a value



   requiredFields.forEach((field) => {
      const input=myForm[field.name];

      if(!input.value) {
         // Check if the error message already exists
         const errorDiv=input.nextElementSibling;

         // If the input is missing a value, add an error message and mark it as missing
         const errorMessage=`${field.name} is required.`;
         console.log`${field.name}`;
         input.classList.add('is-invalid');
         if(!errorDiv||!errorDiv.classList.contains('invalid-feedback')) {
            // Insert the error message after the input
            input.insertAdjacentHTML('afterend',`<div class="invalid-feedback">${errorMessage}</div>`);
         }
         input.classList.add('is-invalid');

         missingFields=true;

      } else {
         // Otherwise, remove any error messages and mark it as valid
         const errorDiv=input.nextElementSibling;
         if(errorDiv&&errorDiv.classList.contains('invalid-feedback')) {
            errorDiv.remove();
         }
         input.classList.remove('is-invalid');
      }



   });



   // If any fields are missing, prevent the form from submitting and scroll to the first error
   if(missingFields) {
      event.preventDefault();
      const firstError=document.querySelector('.is-invalid');
      if(firstError) {
         firstError.scrollIntoView({behavior: 'smooth',block: 'center'});

      }
   }
});


//validate a type switcher dropdown


var saveButton=document.getElementById("save-button");
saveButton.addEventListener("click",function(event) {
   var dropdown=document.getElementsByName("product_type")[0];
   if(dropdown.value==="") {
      event.preventDefault();
      var typeError=document.getElementById("type-error");
      var skuError=document.getElementById("sku-error");
      var nameError=document.getElementById("name-error");
      var priceError=document.getElementById("price-error");


      typeError.innerHTML="* Please select product type";
      skuError.innerHTML="*SKU is required!";
      nameError.innerHTML="*Name is required!";
      priceError.innerHTML="*Price is required!";
      return true;
   }
});

// Type switcher event listener which clears the error message  when product type is selected
var dropdown=document.getElementsByName("product_type")[0];

dropdown.addEventListener("change",function() {
   var error=document.getElementById("type-error");
   error.innerHTML="";

});

const input=document.querySelector('input');
const errorMessage=document.querySelector('.error-message');

input.addEventListener('input',() => {
   if(input.value) {
      errorMessage.textContent='';
   }
   errorMessage.textContent=`${input.name}`
});



///////////////////////////12.04.2023  18:48

if(input.value&&invalidChar.test(input.value)) {

   const errorMessage=`${field.name} contains invalid characters.`;

   //  // Otherwise, remove any error messages and mark it as valid
   // //     const invalidChar=/[^A-Za-z0-9]/;
   // //     // Check if the input value contains any invalid characters
   // //     if(invalidChar.test(input.value)) {

   // //         // If it does, prevent the form from submitting


   console.log(errorMessage);

     if(errorDiv||errorDiv.classList.contains("invalid-feedback")) {
        // Insert the error message after the input
        errorDiv.remove();
        input.insertAdjacentHTML(
           "afterend",
           `<div class="invalid-feedback">${errorMessage}</div>`
        );
        event.preventDefault();
     } else {
        input.insertAdjacentHTML(
           "afterend",
           `<div class="invalid-feedback">${errorMessage}</div>`
        );
     }
     input.classList.add("is-invalid");
  }

  else {
     // Otherwise, remove any error messages and mark it as valid
     const errorDiv=input.nextElementSibling;
     if(errorDiv&&errorDiv.classList.contains("invalid-feedback")) {
        errorDiv.remove();
   }
     input.classList.remove("is-invalid");
}