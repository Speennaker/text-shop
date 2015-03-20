<?php
// [ux_icon] IN DEVELOPMENT!
function ux_icon_shortcode($atts, $content=null, $code) {
    extract(shortcode_atts(array(
      'id'  => '',
      'size'  => '32px',
      'color' => '',
      'border_color' => '',

    ), $atts));
   ob_start();
   $icon_settings = 'fill:#fff;border-color:#fff; width: 32px; height: 32px;';
   $icon_class = 'ux-icon';
  ?> 


<div class="<?php echo $icon_class;?>">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <path d="M256,128c-81.9,0-145.7,48.8-224,128c67.4,67.7,124,128,224,128c99.9,0,173.4-76.4,224-126.6
    C428.2,198.6,354.8,128,256,128z M256,347.3c-49.4,0-89.6-41-89.6-91.3c0-50.4,40.2-91.3,89.6-91.3s89.6,41,89.6,91.3
    C345.6,306.4,305.4,347.3,256,347.3z"/>
  <g>
    <path d="M256,224c0-7.9,2.9-15.1,7.6-20.7c-2.5-0.4-5-0.6-7.6-0.6c-28.8,0-52.3,23.9-52.3,53.3c0,29.4,23.5,53.3,52.3,53.3
      s52.3-23.9,52.3-53.3c0-2.3-0.2-4.6-0.4-6.9c-5.5,4.3-12.3,6.9-19.8,6.9C270.3,256,256,241.7,256,224z"/>
  </g>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <path d="M476.7,422.2L270.1,72.7c-2.9-5-8.3-8.7-14.1-8.7c-5.9,0-11.3,3.7-14.1,8.7L35.3,422.2c-2.8,5-4.8,13-1.9,17.9
    c2.9,4.9,8.2,7.9,14,7.9h417.1c5.8,0,11.1-3,14-7.9C481.5,435.2,479.5,427.1,476.7,422.2z M288,400h-64v-48h64V400z M288,320h-64
    V176h64V320z"/>
</g>
</svg>
</div>


<div class="<?php echo $icon_class;?>">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <path class="st0" d="M240,0L240,0C116,0.3,16.5,100.4,16.5,224c0,123.6,99.5,223.7,223.5,224v64c141,0,256-114.6,256-256
    S381,0,240,0z M224,202v60v26c0,26.5-21.5,48-48,48v-32c8.8,0,16-7.2,16-16v-16h-70c-5.5,0-10-4.5-10-10V154c0-5.5,4.5-10,10-10h92
    c5.5,0,10,4.5,10,10V202z M400,202v60v26c0,26.5-21.5,48-48,48v-32c8.8,0,16-7.2,16-16v-16h-70c-5.5,0-10-4.5-10-10V154
    c0-5.5,4.5-10,10-10h92c5.5,0,10,4.5,10,10V202z"/>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <polygon class="st0" points="96,80 16,112 16,64 96,64   "/>
  <g>
    <path class="st0" d="M336,96V48h-32h-96h-32v48h-48L0,144v304h512V96H336z M256,400c-70.7,0-128-57.3-128-128
      c0-70.7,57.3-128,128-128c70.7,0,128,57.3,128,128C384,342.7,326.7,400,256,400z"/>
    <circle class="icon-blink" cx="256" cy="272" r="100"/>
  </g>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <g class="icon-rotating">
    <path class="st0" d="M256,48C132.3,48,32,148.3,32,272s100.3,224,224,224s224-100.3,224-224S379.7,48,256,48z M391.8,407.8
      C355.5,444,307.3,464,256,464s-99.5-20-135.8-56.2C84,371.5,64,323.3,64,272s20-99.5,56.2-135.8C156.5,100,204.7,80,256,80
      s99.5,20,135.8,56.2C428,172.5,448,220.7,448,272S428,371.5,391.8,407.8z"/>
    <polygon  points="224,288 240,112 264,112 272,272 352,368 336,384    "/>
  </g>
  <g>
    <path  d="M388,16L388,16l-15,28.3C396.6,56.4,418.1,72,437,91c19,19,34.6,40.4,46.7,64l28.2-15
      C484.6,86.9,441.1,43.4,388,16z"/>
  </g>
  <g>
    <path  d="M124,16L124,16l15,28.3C115.4,56.4,93.9,72,75,91c-19,19-34.6,40.4-46.7,64L0,139.9
      C27.4,86.9,70.9,43.4,124,16z"/>
  </g>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" style="<?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <path d="M432,48H80L0,112v352h512V112L432,48z M256,384L144,256h56v-56h112v56h56L256,384z M36,112l60-48h320l60,48H36z"/>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">

<g>
  <polygon class="st0" points="0,0 176,112 176,496 0,352  "/>
  <polygon class="st0" points="512,0 336,112 336,496 512,352  "/>
  <rect x="208" y="128" class="st0" width="96" height="384"/>
  <path class="st0" d="M426,6c-17,0-54.3-1.3-106,26s-64,44.3-64,44.3s-12.3-17-64-44.3S102.7,6,85.7,6s-38,2-38,2l160.2,96H256h47.8
    L464,8C464,8,443,6,426,6z"/>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<polygon class="st0" points="176,464 512,136.1 439.9,64 192,312 80,205 0,288 "/>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g class="icon-rotating">
  <path class="st0" d="M448,256c0-14.5-1.6-28.6-4.7-42.2l58.4-44.2l-48-83.1l-67.5,28.5c-20.7-19.1-45.6-33.7-73.1-42.3L304,0h-96
    l-9.1,72.6c-27.6,8.6-52.4,23.2-73.1,42.3L58.3,86.4l-48,83.1l58.4,44.2C65.6,227.4,64,241.5,64,256c0,14.5,1.6,28.6,4.7,42.2
    l-58.4,44.2l48,83.1l67.5-28.5c20.7,19.1,45.6,33.7,73.1,42.3L208,512h96l9.1-72.6c27.6-8.6,52.4-23.2,73.1-42.3l67.5,28.5l48-83.1
    l-58.4-44.2C446.4,284.6,448,270.5,448,256z M256,320c-35.4,0-64-28.7-64-64c0-35.3,28.7-64,64-64c35.4,0,64,28.7,64,64
    C320,291.3,291.4,320,256,320z"/>
</g>
</svg>
</div>


<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <polygon class="icon-floating" points="256,307.7 384,192 304,192 304,96 207.6,96 207.6,192 128,192  "/>
  <path d="M465.4,297.2l-71.4-55h-42l62,61.8h-50.6c-2.3,0-4.3,1.2-5.4,2.9l-18.4,45.5H172.1l-18.4-45.5c-1-1.8-3.1-2.9-5.4-2.9H97.8
    l62.2-61.8h-42.2l-71.4,55c-10.6,6.2-15.8,19-14.1,31.6l8.7,66.9c2.3,13.1,9.7,20.3,28.1,20.3h373.8c19.1,0,25.8-7.6,28.1-20.3
    l8.7-66.9C481.4,315.9,476,303.4,465.4,297.2z"/>
</g>
</svg>
</div>
<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<path class="icon-floating" d="M256,449.4c28.9,0,56.4-5.7,81.3-15.9c0.6-0.3,1.1-0.5,1.7-0.7c0.1,0,0.2,0,0.2-0.1c3.5-1.3,7.3-2,11.2-2
  c4.3,0,8.4,0.8,12.1,2.4l84,30.9l-22.1-88.4c0-5.3,1.5-10.3,3.9-14.6c0,0,0,0,0,0c0.8-1.3,1.6-2.6,2.5-3.7
  c20.9-31.3,33-68.5,33-108.4C464,137.9,370.9,48,256,48C141.1,48,48,137.9,48,248.7C48,359.6,141.1,449.4,256,449.4z M352,224
  c17.7,0,32,14.3,32,32c0,17.7-14.3,32-32,32c-17.7,0-32-14.3-32-32C320,238.3,334.3,224,352,224z M256,224c17.7,0,32,14.3,32,32
  c0,17.7-14.3,32-32,32c-17.7,0-32-14.3-32-32C224,238.3,238.3,224,256,224z M160,224c17.7,0,32,14.3,32,32c0,17.7-14.3,32-32,32
  c-17.7,0-32-14.3-32-32C128,238.3,142.3,224,160,224z"/>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <g class="icon-spinning">
    <path d="M256,32c-39,0-75.6,10-107.5,27.4C136.9,42.9,117.7,32,96,32c-35.3,0-64,28.7-64,64c0,21.7,10.9,40.9,27.4,52.5
      C42,180.4,32,217,32,256c0,123.7,100.3,224,224,224c123.7,0,224-100.3,224-224C480,132.3,379.7,32,256,32z M64,96
      c0-17.7,14.3-32,32-32c10.5,0,19.8,5,25.6,12.8c-17,12.7-32.1,27.8-44.8,44.8C69,115.8,64,106.5,64,96z M391.8,391.8
      C355.5,428,307.3,448,256,448c-51.3,0-99.5-20-135.8-56.2C84,355.5,64,307.3,64,256c0-51.3,20-99.5,56.2-135.8
      C156.5,84,204.7,64,256,64c51.3,0,99.5,20,135.8,56.2C428,156.5,448,204.7,448,256C448,307.3,428,355.5,391.8,391.8z"/>
  </g>
  <path class="icon-rotating" d="M352,128c0,0-101.6,83.7-120,104s-72,152-72,152s102.4-82.3,120-104S352,128,352,128z"/>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <path  class="icon-floating"  d="M442.8,99.6l-30.4-30.4c-7-6.9-18.2-6.9-25.1,0L355.5,101l55.5,55.5l31.8-31.7C449.7,117.7,449.7,106.5,442.8,99.6z"/>
  <g  class="icon-floating">
    <polygon points="346.1,110.5 174.1,288 160,352 224,337.9 400.6,164.9    "/>
  </g>
  <path d="M384,256v150c0,5.1-3.9,10.1-9.2,10.1s-269-0.1-269-0.1c-5.6,0-9.8-5.4-9.8-10s0-268,0-268c0-5,4.7-10,10.6-10H256l32-32
    H87.4c-13,0-23.4,10.3-23.4,23.3v305.3c0,12.9,10.5,23.4,23.4,23.4h305.3c12.9,0,23.3-10.5,23.3-23.4V224L384,256z"/>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <rect x="80" y="352" width="64" height="64"/>
  <rect x="176" y="288" width="64" height="128"/>
  <rect x="272" y="192" width="64" height="224"/>
  <rect x="368" y="96" width="64" height="320"/>
</g>
</svg>
</div>

<div class="<?php echo $icon_class;?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; <?php echo $icon_settings; ?>" xml:space="preserve">
<g>
  <path class="icon-floating" d="M67,148.7c11,5.8,163.8,89.1,169.5,92.1c5.7,3,11.5,4.4,20.5,4.4c9,0,14.8-1.4,20.5-4.4c5.7-3,158.5-86.3,169.5-92.1
    c4.1-2.1,11-5.9,12.5-10.2c2.6-7.6-0.2-10.5-11.3-10.5H257H65.8c-11.1,0-13.9,3-11.3,10.5C56,142.9,62.9,146.6,67,148.7z"/>
  <path d="M455.7,153.2c-8.2,4.2-81.8,56.6-130.5,88.1l82.2,92.5c2,2,2.9,4.4,1.8,5.6c-1.2,1.1-3.8,0.5-5.9-1.4l-98.6-83.2
    c-14.9,9.6-25.4,16.2-27.2,17.2c-7.7,3.9-13.1,4.4-20.5,4.4c-7.4,0-12.8-0.5-20.5-4.4c-1.9-1-12.3-7.6-27.2-17.2l-98.6,83.2
    c-2,2-4.7,2.6-5.9,1.4c-1.2-1.1-0.3-3.6,1.7-5.6l82.1-92.5c-48.7-31.5-123.1-83.9-131.3-88.1c-8.8-4.5-9.3,0.8-9.3,4.9
    c0,4.1,0,205,0,205c0,9.3,13.7,20.9,23.5,20.9H257h185.5c9.8,0,21.5-11.7,21.5-20.9c0,0,0-201,0-205
    C464,153.9,464.6,148.7,455.7,153.2z"/>
</g>
</svg>
</div>

  <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;

}
add_shortcode('ux_icon', 'ux_icon_shortcode');