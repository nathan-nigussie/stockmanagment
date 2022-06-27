selectElement=document.querySelector("#productType");

function myNewFunction() {
   selectedProduct=selectElement.options[selectElement.selectedIndex].value;
   if(selectedProduct==="DVD") {
      document.querySelector(
         ".select.display"
      ).innerHTML=` 
<div class="form-group row">
   <label for="inputsize" class="col-sm-2 col-form-label">SIZE(MB)</label>
   <div class="col-sm-6">
      <input type="number" id="size" name="size" autocomplete="off" placeholder='#Size'
         class="form-control form-control-sm" >
        
   </div>
      <span class="reminder">"Please provide product size in Megabyte(MB)"</span>
</div>
`;
   } else if(selectedProduct==="Furniture") {
      document.querySelector(
         ".select.display"
      ).innerHTML=`
<div class="form-group row">
   <label for="inputweight" class="col-sm-2 col-form-label">Height(CM):</label>
   <div class="col-sm-6">
      <input type="number"  autocomplete="off"  placeholder="#height" id="height" name="height"
         class="form-control form-control-sm" required>
   </div>
</div>
<div class="form-group row">
   <label for="inputweight" class="col-sm-2 col-form-label">Length(CM):</label>
   <div class="col-sm-6">
      <input type="number"  autocomplete="off"  placeholder="#length" id="height" name="length"
         class="form-control form-control-sm" required>
   </div>
</div>
<div class="form-group row">
   <label for="inputlength" class="col-sm-2 col-form-label">Width(CM):</label>
   <div class="col-sm-6">
      <input type="number" autocomplete="off" id="width" name="width" placeholder="#Width"
         class="form-control form-control-sm" required>
   </div>
   <span class="reminder">"Please provide dimension in HxLxW format"</span>
   
</div>
<div>
`;
   } else {
      document.querySelector(
         ".select.display"
      ).innerHTML=` 
<div class="form-group row">
   <label for="inputweight" class="col-sm-2 col-form-label">WEIGHT(KG)</label>
   <div class="col-sm-6">
      <input type="number" id="weight" name="weight" autocomplete="off" placeholder='#weight'
         class="form-control form-control-sm" >
   </div>
   
    <span class="reminder">"Please provide product weight in Kilog(KG)"</span>
</div>
`;
   }
}