<footer class="footer" id="footer_id">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">
                  Copyright 2020 © Fingertips All rights reserved.
                </p>
              </div>
              <div class="col-md-6">
                <!-- <p class="pull-right mb-0">
                  Hand crafted & made with<i class="fa fa-heart"></i> by <a href="https://anzarkhan.com/">Anzarkhan.com</a>
                </p> -->
              </div>
            </div>
          </div>
        </footer>

        <script>
// function changePosition(n){
//   elementOffset = $('#ul-menu'+n).offset().top,
//   document.getElementById('menu'+n).style.position = "fixed";
//   document.getElementById('menu'+n).style.top = elementOffset+60+"px";
//   console.log('changeposition function called');
//   console.log(elementOffset);
// }
// function changePosition2(n){
//   document.getElementById('menu'+n).style.position = "relative";

//   console.log('changeposition2 function called');
// }
// function showOffset(){
//   elementOffset = document.getElementById('ul-menu'+1).offset().top,  
//   console.log(elementOffset);
// }
</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>