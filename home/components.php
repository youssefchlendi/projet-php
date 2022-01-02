<?php
 function productShow($category_id,$product_img,$product_name,$product_desc,$product_price,$product_id){
  $return ="<div class='col-sm-6 col-lg-4 all ".categoryName($category_id)."'>
  <div class='box'>
    <div>
    <form action='menu/index.php' method ='post'>
    
      <div class='img-box'>
        <img src='uploads/".$product_img."' alt='s'>
        <input type='hidden' name='himage' value='".$product_img."'>
      </div>
      <div class='detail-box'>
        <h5>
          <input type='hidden' name='hname' value='".$product_name."'>
          <input type='hidden' name='hid' value='".$product_id."'>
          
          <input type='hidden' name='hprix' value='".$product_price."'>
          <input type='hidden' name='hcategorie' value='". $category_id."'>
          ".$product_name."
        </h5>
        <input type='hidden' name='hdescription' value='".$product_desc."'>
        <p>
        ".$product_desc."
      </p>
        <div class='container'>
          <h6 class='d-inline'>
          <input type='hidden' name='hprice' value='".$product_price."'>
            Dt ".$product_price."
          </h6>
          <button name='add' class='btnrem float-right' name='submit' type ='submit'> 
    <div class='options'><a><svg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 456.029 456.029' style='enable-background:new 0 0 456.029 456.029;' xml:space='preserve'>
      <g>
        <g>
          <path d='M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
       c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z' />
        </g>
      </g>
      <g>
        <g>
          <path d='M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
       C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
       c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
       C457.728,97.71,450.56,86.958,439.296,84.91z' />
        </g>
      </g>
      <g>
        <g>
          <path d='M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
       c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z' />
        </g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
    </svg></a></div>
          </button>
          <div class='input-group input-group-sm mr-3 w-25 float-right'>
          <input type='number' min='1' name='qte' class='form-control' value=1 aria-label='Small' aria-describedby='inputGroup-sizing-sm'>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
";
echo $return;
}
function productShowMenu($category_id,$product_img,$product_name,$product_desc,$product_price,$product_id){
  $return ="<div class='col-sm-6 col-lg-4 all ".categoryName($category_id)."'>
  <div class='box'>
    <div>
    <form action='' method ='post'>
    
      <div class='img-box'>
        <img src='../uploads/".$product_img."' alt='s'>
        <input type='hidden' name='himage' value='".$product_img."'>
      </div>
      <div class='detail-box'>
        <h5>
          <input type='hidden' name='hname' value='".$product_name."'>
          <input type='hidden' name='hid' value='".$product_id."'>
          
          <input type='hidden' name='hprix' value='".$product_price."'>
          <input type='hidden' name='hcategorie' value='". $category_id."'>
          ".$product_name."
        </h5>
        <input type='hidden' name='hdescription' value='".$product_desc."'>
        <p>
        ".$product_desc."
      </p>
        <div class='container'>
          <h6 class='d-inline'>
          <input type='hidden' name='hprice' value='".$product_price."'>
            Dt ".$product_price."
          </h6>
          <button name='add' class='btnrem float-right' name='submit' type ='submit'> 
    <div class='options'><a><svg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 456.029 456.029' style='enable-background:new 0 0 456.029 456.029;' xml:space='preserve'>
      <g>
        <g>
          <path d='M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
       c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z' />
        </g>
      </g>
      <g>
        <g>
          <path d='M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
       C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
       c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
       C457.728,97.71,450.56,86.958,439.296,84.91z' />
        </g>
      </g>
      <g>
        <g>
          <path d='M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
       c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z' />
        </g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
      <g>
      </g>
    </svg></a></div>
          </button>
          <div class='input-group input-group-sm mr-3 w-25 float-right'>
          <input type='number' min=1  name='qte' class='form-control' value=1 aria-label='Small' aria-describedby='inputGroup-sizing-sm'>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
";
echo $return;
}