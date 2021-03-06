/* Ajax
============================================================================ */

function ajax(url, callback, message) {
    var XHR = null;

    if (XMLHttpRequest) {
        XHR = new XMLHttpRequest();
    } 

    else {
        XHR = new ActiveXObject('Microsoft.XMLHTTP');
    }

    XHR.onreadystatechange = function() {
        if (XHR.readyState === 4 || XHR.readyState === 'complete') {

            if (XHR.status === 200) {
                callback(XHR);
            } 

            else {
                console.log('Fel på servern');
            }

        }
    };

    XHR.open('POST', url, true);
    XHR.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    XHR.send(message);
}



/* Polyfill for event handlers (Vanilla)
============================================================================ */

function addEvent(event, elem, func) {
    if (elem.addEventListener) { // W3C DOM
        elem.addEventListener(event, func, false);
    }

    else if (elem.attachEvent) { // IE DOM
        elem.attachEvent('on'+event, func);
    }

    else { // Not much to do
        elem[event] = func;
    }
}



/* Toggle function (Vanilla)
============================================================================ */

function toggle(obj) {
    var elem = document.querySelector(obj);
    elem.classList.toggle('active');
}

(function() {
    var moreSpec = document.querySelector('.js-spec');

    if (moreSpec) {
        addEvent('click', moreSpec, function() {
            toggle('.js-spec');
            toggle('.post_spec');
        })
    }
})();

function EditStatus(name) {
    this.postStartStatus = document.querySelector('.post_start--'+name);

    if (this.postStartStatus != null) {
        this.postStatus = document.querySelector('.post_'+name);
        this.postCancelStatus = document.querySelector('.post_cancel--'+name);

        if (this.postStartStatus) {
            addEvent('click', this.postStartStatus, function(e) {
                e.preventDefault();
                toggle('.post_'+name+'-bg');
            });
        }

        if (this.postCancelStatus) {
            addEvent('click', this.postCancelStatus, function(e) {
                e.preventDefault();
                toggle('.post_'+name+'-bg');
            });
        }

        if (this.postStatus) {
            addEvent('submit', this.postStatus, function(e) {
                e.preventDefault();
                // Submit the form
            });
        }
    }
}

/* Set status to draft  */
(function() {
    var status = new EditStatus('draft');
})();

/* Set status to delete  */
(function() {
    var status = new EditStatus('delete');
})();

/* Set status to publish  */
(function() {
    var status = new EditStatus('publish');
})();

/* Update user email  */
(function() {
    var status = new EditStatus('email');
})();



/* Custom dropdown list - inspired by Codrops (Vanilla)
============================================================================ */

function Dropdown(name) {
    this.btn = document.querySelector('.js-'+name+'-btn');

    if (this.btn != null) {
        this.list = document.querySelector('.js-'+name+'-list');
        this.items = document.querySelectorAll('.js-'+name+'-item');
        this.data = 'data-'+name;
        this.placeholder = this.btn.children[1];
        this.inputData = this.btn.children[2];

        addEvent('click', this.list, (function(obj) {
            return function() {
                //if (obj.btn.classList.contains('active')) {
                    obj.btn.classList.toggle('active');
                //}

                //if (obj.list.classList.contains('active')) {
                    obj.list.classList.toggle('active');
                //}
            }
        })(this));

        addEvent('click', this.btn, (function(obj) {
            return function() {
                // obj.remove('.js-category-btn');
                // obj.remove('.js-category-list');
                // obj.remove('.js-brand-btn');
                // obj.remove('.js-brand-list');
                // obj.remove('.js-size-btn');
                // obj.remove('.js-size-list');
                // obj.remove('.js-region-btn');
                // obj.remove('.js-region-list');
            
                obj.toggle('.js-'+name+'-btn');
                obj.toggle('.js-'+name+'-list');
            }
        })(this));

        for (var i = 0; i < this.items.length; i++) {
            var item = this.items[i];

            addEvent('click', item, (function(obj) {
                return function() {
                    var itemText = this.innerText;
                    var itemData = this.getAttribute(obj.data); // For vanilla JavaScript: this.getAttribute('data-brand') or this.dataset.brand. Mark Otto recommends jQuery as it works in all browsers - even legacy.
                    obj.placeholder.innerText = itemText;
                    obj.inputData.value = itemData;
                }
            })(this));

        }
    }

    Dropdown.prototype.toggle = function(obj) {
        var elem = document.querySelector(obj);
        elem.classList.toggle('active');
    }

    Dropdown.prototype.remove = function(obj) {
        var elem = document.querySelector(obj);
        elem.classList.remove('active');
    }

    Dropdown.prototype.add = function(obj) {
        var elem = document.querySelector(obj);
        elem.classList.add('active');
    }
}

/* Dropdown category */
(function() {
    var categoryList = new Dropdown('category');
})();

/* Dropdown brand */
(function() {
    var categoryList = new Dropdown('brand');
})();

/* Dropdown size */
(function() {
    var categoryList = new Dropdown('size');
})();

/* Dropdown region */
(function() {
    var categoryList = new Dropdown('region');
})();



/* Resize height on textarea (Vanilla)
============================================================================ */

(function() {
    var postTitle = document.querySelector('.post_title');

    if (postTitle) {
        function resizePostTitle() {
            postTitle.style.height = 'auto';
            postTitle.style.height = postTitle.scrollHeight+'px';
        }

        addEvent('change', postTitle, resizePostTitle);
        addEvent('cut', postTitle, delayedResize);
        addEvent('paste', postTitle, delayedResize);
        addEvent('drop', postTitle, delayedResize);
        addEvent('keydown', postTitle, delayedResize);

        postTitle.focus();
        postTitle.select();
    }

    resizePostTitle();

    var postText = document.querySelector('.post_text');

    if (postText) {
        function resizePostText() {
            postText.style.height = 'auto';
            postText.style.height = postText.scrollHeight+'px';
        }

        addEvent('change', postText, resizePostText);
        addEvent('cut', postText, delayedResize);
        addEvent('paste', postText, delayedResize);
        addEvent('drop', postText, delayedResize);
        addEvent('keydown', postText, delayedResize);

        postText.focus();
        postText.select();
    }

    resizePostText();

    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resizePostTitle, 0);
        window.setTimeout(resizePostText, 0);
    }
})();



/* Preview upload file (jQuery)
============================================================================ */

$(function() {
    $(".post_file--upload").on("change", function() {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                $(".post_file--preview").attr("src", this.result);

                // .css("background-image", "url("+this.result+")");
                // $(".post_file--preview").css("height", "600px");
                // $(".post_file--preview").css("box-shadow", "0 1px 2px 0 rgba(0,0,0,.05)");
                $(function() {
                    $('.item').matchHeight();
                });
            }
        }
    });
});




/* Submit search with Ajax (Vanilla)
============================================================================ */

// var searchBtn = document.querySelector('.js-search-form');

// if (searchBtn) {
//     addEvent('click', searchBtn, function(e) {
//         e.preventDefault();
//         console.log('hej');
//         var searchCategory = document.getElementById('category').value;
//         var searchBrand = document.getElementById('brand').value;
//         var searchSize = document.getElementById('size').value;
//         var searchRegion = document.getElementById('region').value;
//         var searchPriceMin = document.getElementById('price-min').value;
//         var searchPriceMax = document.getElementById('price-max').value;
//         console.log(searchCategory);
//         ajax("http://bonvelo.loc/wp-content/themes/bonvelo/template-search.php", cbSearch, "category="+searchCategory);
//         // "category="+searchCategory+"&brand="+searchBrand+"&size="+searchSize+"&region"+searchRegion+"&price-min="+searchPriceMin+"&price-max="+searchPriceMax
//     });
// }  

// function cbSearch(data) {
//     console.log(data.responseText);
// }


/* Validate publish form (Vanilla)
============================================================================ */

// function publishPost() {
//   var fname = document.forms['post']['post_fname'];
//   var error_fname = document.querySelector('.post_error-fname');
//
//   var lname = document.forms['post']['post_lname'];
//   var error_lname = document.querySelector('.post_error-lname');
//
//   var email = document.forms['post']['post_email'];
//   var error_email = document.querySelector('.post_error-email');
//
//   var title = document.forms['post']['post_title'];
//   var error_title = document.querySelector('.post_error-title');
//
//   var gears = document.forms['post']['post_gear-group'];
//   var error_gears = document.querySelector('.post_error-gears');
//
//   var wheels = document.forms['post']['post_wheels'];
//   var error_wheels = document.querySelector('.post_error-wheels');
//
//   var year = document.forms['post']['post_year'];
//   var error_year = document.querySelector('.post_error-year');
//
//   var price = document.forms['post']['post_sales-price'];
//   var error_price = document.querySelector('.post_error-price');
//
//   // Validate fname if variable exist
//   if (typeof fname !== 'undefined') {
//     if (!(fname.value.match('^[a-zåäöA-ZÅÄÖ_ ]*$'))) {
//       error_fname.style.display = "block";
//       error_fname.innerHTML = "Förnamn saknas.";
//       fname.focus();
//       fname.style.border = "1px solid #f00";
//       return false;
//     }
//
//     else {
//       error_fname.style.display = "none";
//     }
//   }
//
//   // Validate lname if variable exist
//   if (typeof lname !== 'undefined') {
//     if (!(lname.value.match('^[a-zåäöA-ZÅÄÖ_ ]*$'))) {
//       error_lname.style.display = "block";
//       error_lname.innerHTML = "Efternamn saknas.";
//       lname.focus();
//       lname.style.border = "1px solid #f00";
//       return false;
//     }
//
//     else {
//       error_lname.style.display = "none";
//     }
//   }
//
//   // Validate email if variable exist
//   if (typeof email !== 'undefined') {
//     if (!(email.value.match('^[a-z0-9._+-]+[a-z0-9]+@[a-z0-9.-]+\.[a-z]{2,4}$'))) {
//       error_email.style.display = "block";
//       error_email.innerHTML = "Skriv in en giltig e-post.";
//       email.focus();
//       email.style.border = "1px solid #f00";
//       return false;
//     }
//
//     else {
//       error_email.style.display = "none";
//     }
//   }
//
//   // Validate title
//   if (!(title.value.match('^[a-zåäöA-ZÅÄÖ_ ]*$'))) {
//     error_title.style.display = "block";
//     error_title.innerHTML = "Rubrik saknas.";
//     title.focus();
//     title.style.border = "1px solid #f00";
//     return false;
//   }
//
//   else {
//     error_title.style.display = "none";
//   }
//
//   // Validate gears
//   if (!(gears.value.match('^[a-zåäöA-ZÅÄÖ0-9_ ]*$'))) {
//     error_gears.style.display = "block";
//     error_gears.innerHTML = "Växelgrupp saknas.";
//     gears.focus();
//     gears.style.border = "1px solid #f00";
//     return false;
//   }
//
//   else {
//     error_gears.style.display = "none";
//   }
//
//   // Validate wheels
//   if (!(wheels.value.match('^[a-zåäöA-ZÅÄÖ0-9_ ]*$'))) {
//     error_wheels.style.display = "block";
//     error_wheels.innerHTML = "Hjul saknas.";
//     wheels.focus();
//     wheels.style.border = "1px solid #f00";
//     return false;
//   }
//
//   else {
//     error_wheels.style.display = "none";
//   }
//
//   // Validate year
//   if (!(year.value.match('^[0-9]{4,4}$'))) {
//     error_year.style.display = "block";
//     error_year.innerHTML = "Fyll i årsmodell med fyra siffror. Exempel: 2014.";
//     year.focus();
//     year.style.border = "1px solid #f00";
//     return false;
//   }
//
//   else {
//     error_year.style.display = "none";
//   }
//
//   // Validate price
//   if (!(price.value.match('^[0-9]{1,7}$'))) {
//     error_price.style.display = "block";
//     error_price.innerHTML = "Annonsen måste ha ett pris och bara siffror är tillåtet. Om produkten skänkes bort skriver du 0.";
//     price.focus();
//     price.style.border = "1px solid #f00";
//     return false;
//   }
//
//   else {
//     error_price.style.display = "none";
//   }
//
//   return true;
// }
//
// var submitPost = document.querySelector('.post');
// addEvent('submit', submitPost, function(e) {
//   var val = publishPost();
//
//   // If publishPost returns true send post else stop submit
//   if (val === true) {}
//
//   else {
//     e.preventDefault();
//   }
//
// }, false);



