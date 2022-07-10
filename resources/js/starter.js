var event;
var height;


jQuery.event.special.touchstart = {
    setup: function (_, ns, handle) {
        this.addEventListener("touchstart", handle, { passive: true });
    },
};

Modernizr.on("webp", function (result) {
    if (result) {
        jQuery.event.special.touchstart = {
            setup: function (_, ns, handle) {
                if (ns.includes("noPreventDefault")) {
                    this.addEventListener("touchstart", handle, {
                        passive: false,
                    });
                } else {
                    this.addEventListener("touchstart", handle, {
                        passive: true,
                    });
                }
            },
        };
        jQuery.event.special.touchmove = {
            setup: function (_, ns, handle) {
                if (ns.includes("noPreventDefault")) {
                    this.addEventListener("touchmove", handle, {
                        passive: false,
                    });
                } else {
                    this.addEventListener("touchmove", handle, {
                        passive: true,
                    });
                }
            },
        };
    }
});

$(window).on("load", function (e) {
    event = e || window.event;

    starter.init();
});

var starter = {
    _var: {
        // slim_img_ean_2: null,
        // slim_img_ean_1: null,
        // slim_img_receipt_1: null,
        // wow: null,
        collections: new Array(),
    },

    _const: {},

    init: function () {
        // starter.webp.init(true);
        //$("img").unveil(200, false);

        starter.onClick();
        starter.onChange();
        starter.onSubmit();
        starter.onInputs();
        starter.mouseEnter();
        starter.mouseLeave();
        starter.formStyled();

        // starter.plugins.owl.init(".owl-carousel");
        // starter.plugins.slim.init();

        // starter.wow.init();

        starter.autoscroll.init();
    },

    onClick: function () {
        $(document).on("click", "a", function () {
            return starter.scrollOrLink($(this).attr("href"));
        });

        $(document).on("click", "button.button-uploads", function () {
            $(this).prev().find("input[type=file]").trigger("click");
        });


        // $(document).on("click", ".button.upload", function () {
        //     $(this).prev().prev().prev().find(".slim-file-hopper").trigger("click");
        //     return false;
        // });

        // $(document).on("click", "a.item-shop-image", function () {
        //     let domain = new URL(this.getAttribute("href"));
        //
        //     SR.event.track("Id\u017a do Sklepu", {
        //         eventLabel: "productGoToShop70latrh",
        //         name: document.querySelector(".row.logos h3").innerHTML,
        //         model: document.querySelector(".row.logos .item-product-image").dataset.symbol,
        //         brand: "RussellHobbs",
        //         shop: domain.hostname.replace("www.", ""),
        //     });
        //     return true;
        // });

        // $(document).on("change", ".input-checkbox.product-2", function (e) {
        //     e.target.checked === true
        //         ? $(".field-product-2").addClass("is-show")
        //         : $(".field-product-2").removeClass("is-show");
        // });

        // $(document).on("input", "#where.select", function () {
        //     if ($(this).val() === "20") {
        //         console.log($(this));
        //         $(this).parent().next().removeClass("hidden");
        //     } else {
        //         $(this).parent().next().addClass("hidden");
        //     }
        // });

        // $("#modal").on("show.bs.modal", function (e) {
        //     var $type = $(e.relatedTarget).data("type");
        //     var $links = new Array();
        //     var $modal = $(this);
        //
        //     console.log($(e.relatedTarget).data("id"));
        //
        //     $modal.find("h2").text($(e.relatedTarget).data("title"));
        //     $modal.find(".modal-body .logos > div").remove();
        //
        //     if ($type == "buy") {
        //         $.getJSON("/static/pl/json/products.min.json", function (data_c) {
        //             console.log(data_c);
        //
        //             var $param = $(e.relatedTarget).data("collection");
        //             var product = data_c[$(e.relatedTarget).data("id")];
        //
        //             console.log(product);
        //
        //             // console.log(data_c);
        //             // var $param_type = $(e.relatedTarget).data("param-type");
        //
        //             // if ($param_type) {
        //             //     $products = data_c.types[$param][$param_type];
        //             // } else {
        //             //     $products = data_c.collections[$param];
        //             // }
        //
        //             var $links_html = "";
        //
        //             $.each(product.urls, function (index, url) {
        //                 $links_html +=
        //                     '<a href="' +
        //                     url +
        //                     '" title="Kup teraz" class="col-12 col-xl-6 item-shop-image" target="_blank" title="Kup Teraz" rel="noopener noreferrer"></a>';
        //             });
        //
        //             $modal
        //                 .find(".modal-body .logos")
        //                 .append(
        //                     '<div class="col-12 item">' +
        //                     "   <h3>" +
        //                     product.title +
        //                     "</h3>" +
        //                     '   <div class="item-product-image" data-symbol="' +
        //                     $(e.relatedTarget).data("id") +
        //                     '">' +
        //                     '       <img src="/static/pl/img/products/thumb/' +
        //                     $(e.relatedTarget).data("id") +
        //                     '.png" alt="' +
        //                     $(e.relatedTarget).data("id") +
        //                     '" />' +
        //                     "</div>" +
        //                     '   <div class="row links">' +
        //                     $links_html +
        //                     "</div>" +
        //                     "</div>"
        //                 );
        //
        //             // $.each(data_c.products[value], function (index, value) {
        //             //     $links_html +=
        //             //         '<a href="' +
        //             //         value +
        //             //         '" title="Kup teraz" class="col-12 col-xl-6 item-shop-image" target="_blank" title="###" rel="noopener noreferrer"></a>';
        //             // });
        //
        //             //     $links[value] = data_c.products[value];
        //             //     var $links_html = "";
        //             //     $.each(data_c.products[value], function (index, value) {
        //             //         $links_html +=
        //             //             '<a href="' +
        //             //             value +
        //             //             '" title="Kup teraz" class="col-12 col-xl-6 item-shop-image" target="_blank" title="###" rel="noopener noreferrer"></a>';
        //             //     });
        //             //     $modal
        //             //         .find(".modal-body .logos")
        //             //         .append(
        //             //             '<div class="col-12 col-xl-4 item">' +
        //             //                 '   <div class="item-product-image" data-symbol="' +
        //             //                 value +
        //             //                 '">' +
        //             //                 '       <img src="/static/pl/img-org/products/' +
        //             //                 value +
        //             //                 '.png" alt="' +
        //             //                 value +
        //             //                 '" />' +
        //             //                 "</div>" +
        //             //                 '   <div class="row links">' +
        //             //                 $links_html +
        //             //                 "</div>" +
        //             //                 "</div>"
        //             //         );
        //         });
        //     }
        // });

        // $(document).on("click", "#kontakt button.send", function () {
        //     $.ajax({
        //         url: "/kontakt-wyslij/",
        //         type: "POST",
        //         cache: false,
        //         dataType: "json",
        //         data: {
        //             contact_name: $("#kontakt #contact_name").val(),
        //             contact_email: $("#kontakt #contact_email").val(),
        //             contact_message: $("#kontakt #contact_message").val(),
        //             contact_legal_1: $("#kontakt #contact_legal_1").prop("checked") ? "on" : null,
        //         },
        //
        //         beforeSend: function (xhr) {
        //             $("#kontakt a.send")
        //                 .hide()
        //                 .after(
        //                     '<img src="/static/pl/svg/spiner.svg" alt="spiner" class="spiner" />'
        //                 );
        //
        //             $return = true;
        //
        //             $("#kontakt .error-post").text("");
        //
        //             if (!$("#kontakt #contact_name").val()) {
        //                 $return = false;
        //             }
        //
        //             $("#kontakt input, #kontakt textarea").each(function (key, element) {
        //                 if (!$(element).val()) {
        //                     $(element)
        //                         .closest(".field")
        //                         .addClass("has-error")
        //                         .find(".error-post")
        //                         .text("To pole jest wymagane.");
        //
        //                     $return = $return && false;
        //                 }
        //
        //                 if ($(element).attr("type") == "email") {
        //                     if (!starter.validateEmail($(element).val())) {
        //                         $(element)
        //                             .closest(".field")
        //                             .addClass("has-error")
        //                             .find(".error-post")
        //                             .text("Wprowadź poprawny adres email.");
        //
        //                         $return = $return && false;
        //                     }
        //                 }
        //
        //                 if ($(element).attr("type") == "checkbox") {
        //                     if (!$(element).is(":checked")) {
        //                         $(element)
        //                             .closest(".field")
        //                             .addClass("has-error")
        //                             .find(".error-post")
        //                             .text("To pole jest wymagane.");
        //
        //                         $return = $return && false;
        //                     }
        //                 }
        //             });
        //
        //             if (!$return) {
        //                 $("#kontakt .spiner").hide().prev().show();
        //             }
        //
        //             return $return;
        //         },
        //
        //         success: function (json) {
        //             if (json.isSuccess) {
        //                 // $("#kontakt #contact_name").val().split(" ")[0];
        //
        //                 $("#kontakt h3").html(json.message);
        //                 $("#kontakt #form").hide();
        //             } else {
        //                 $.each(json.parameters.post, function (key, value) {
        //                     $("#kontakt #" + key)
        //                         .closest(".field")
        //                         .find(".error-post")
        //                         .text(value);
        //                 });
        //             }
        //
        //             $("#kontakt .spiner").hide().prev().show();
        //         },
        //         error: function (x, t, m) {
        //             console.log(x);
        //             console.log(t);
        //             console.log(m);
        //         },
        //     });
        //     return false;
        // });
    },

    onChange: function () {
        $(document).on('change', '.input, .textarea, .checkbox', function () {
            console.log('onChange');
            const item = $(this);
            const value = $(this).val().trim();
            const name = $(this).attr('name');

            const valid = () => {
                switch (name) {
                    case 'firstname':
                        return starter.validator.isName(value, 'Imię');
                    case 'lastname':
                        return starter.validator.isName(value, 'Nazwisko');
                    case 'email':
                        return starter.validator.isEmail(value, 'Adres e-mail');
                    case 'phone':
                        return starter.validator.isPhone(value, 'Telefon');
                    case 'address':
                        return starter.validator.isAddress(value, 'Ulica');
                    case 'address_nb':
                        return starter.validator.isAddressNb(value, 'Nr domu / mieszkania');
                    case 'city':
                        return starter.validator.isCity(value, 'Miasto');
                    case 'zip':
                        return starter.validator.isZip(value, 'Kod pocztowy');
                    case 'voivodeship':
                        return starter.validator.isVoivodeship(value, 'Województwo');
                    case 'product':
                        return starter.validator.isProduct(value, 'Zakupiony produkt');
                    case 'shop':
                        return starter.validator.isShop(value, 'Rodzaj sklepu');
                    case 'free':
                        return starter.validator.isFree(value, 'Gratis');
                    case 'where':
                        return starter.validator.isWhere(value, 'Skąd wiesz o promocji');
                    case 'receipt_number':
                        return starter.validator.isReceiptNumber(value, 'Numer dowodu zakupu');
                    case 'legal_1':
                        return starter.validator.isLegal(item);
                    case 'legal_2':
                        return starter.validator.isLegal(item);
                    case 'just_for_you_id':
                        return starter.validator.isNumber(value, 'Numer zgłoszenia');
                    case 'url':
                        return starter.validator.isURL(value, 'Link do opinii');
                    case 'content':
                        return starter.validator.isContent(value, 'Treść opinii');
                        return;
                }
            }

            if (valid() !== true) {
                $(`.error-${name}`).text(valid());
            } else {
                $(`.error-${name}`).text('');
            }

        });

        $(document).on("change", ".upload-file", function () {
            const file = this.files[0];
            const fieldId = $(this).attr('id');

            console.log(file);
            console.log(fieldId);

            $(`.error-${fieldId}`).text('');

            if (file) {
                if (file.size <= 4 * 1024 * 1024) {
                    const extension = file.name.split('.').pop().toLowerCase();
                    if (['jpg', 'jpeg', 'png'].indexOf(extension) !== -1) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $(`#${fieldId}_thumb`).attr('src', event.target.result).parent().removeClass('hidden').next().addClass('hidden');
                        }
                        reader.readAsDataURL(file);
                    } else {
                        // Wyświetlenie komunikatu o błędzie
                        $(`.error-${fieldId}`).text('Można wybrać tylko pliki graficzne JPG, JPEG lub PNG');
                        // Wyczyszczenie pola wyboru pliku
                        $(this).val('');
                    }
                } else {
                    // Wyświetlenie komunikatu o błędzie
                    $(`.error-${fieldId}`).text('Rozmiar pliku nie może przekraczać 4 MB');
                    // Wyczyszczenie pola wyboru pliku
                    $(this).val('');
                }
            }
        });

        $(document).on("change", "#is_product_2", function (e) {
            e.target.checked === true
                ? $(".field-product-2").addClass("is-show")
                : $(".field-product-2").removeClass("is-show");
        });

        $(document).on("change", "[name=legal_0]", function (e) {
            // this.checked == true
            //     ? $(".legal input").each(function () {
            //         this.checked = true;
            //         $(this).trigger('change');
            //     })
            //     : $(".legal input").each(function () {
            //         this.checked = false;
            //         $(this).trigger('change');
            //     });
            const isChecked = this.checked;
            $(".legal input").each(function () {
                this.checked = isChecked;
                $(this).trigger('change');
            });
        });

        // $("[name=legal_0]").click(function () {
        //     this.checked == true
        //         ? $("input.legal").each(function () {
        //             this.checked = true;
        //             $(this).next().next().text('');
        //         })
        //         : $("input.legal").each(function () {
        //             this.checked = false;
        //             // $(this).next().next().text('');
        //         });
        // });

    },

    onSubmit: function () {
        $(document).on('submit', '#formApplication form', function () {
            const fields = starter.getFields($(this).closest('form'));
            const url = $(this).closest('form').attr('action');

            axios({
                method: 'post',
                url: url,
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fields,
            }).then(function (response) {
                window.location = response.data.results.url;
            }).catch(function (error) {
                $(`.error-post`).text('');
                if (error.response) {
                    console.log('error.response');
                    // The request was made and the server responded with a status code
                    // that falls out of the range of 2xx
                    // console.log(error.response.data);
                    // console.log(error.response.status);
                    // console.log(error.response.headers);

                    Object.keys(error.response.data.errors).map((item) => {
                        $(`.error-${item}`).text(error.response.data.errors[item][0]);
                    });
                } else if (error.request) {
                    console.log('error.request');
                    // The request was made but no response was received
                    // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                    // http.ClientRequest in node.js
                    console.log(error.request);
                } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                }
            });

            return false;

            // const fields = starter.getFields($(this).closest('form'));
            // const url = $(this).closest('form').attr('action');
            //
            // console.log(fields);
            // console.log(url);

            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     success: function (data) {
            //         console.log(data);
            //
            //         if (data.success) {
            //             location.href = data.redirect;
            //         } else {
            //             $('.error-post').text('');
            //
            //             $.each(data.errors, function(key, item) {
            //                 $(`#application_form_${key}`).closest('.element').find('.error-post').text(item);
            //             });
            //         }
            //     },
            //     error: function () {
            //         console.error('Błąd sieciowy');
            //     }
            // });

            // return false;
        });
    },

    onInputs: function () {
        $(document).on("input", ".input, .textarea", function (e) {
            e.target.value !== "" ? $(this).addClass("has-value").removeClass("no-value") : $(this).removeClass("has-value");
        });

        $(document).on("input", "#whence.select", function () {
            if ($(this).val() === "5") {
                $(this).parent().next().removeClass("hidden");
            } else {
                $(this).parent().next().addClass("hidden");
            }
        });

    },

    plugins: {
        // slim: {
        //     init: function () {
        //         starter._var.slim_img_ean_1 = starter.plugins.slim.execute("img_ean_1");
        //         starter._var.slim_img_ean_2 = starter.plugins.slim.execute("img_ean_2");
        //         starter._var.slim_img_receipt_1 = starter.plugins.slim.execute("img_receipt_1");
        //
        //         //starter._var.slim_img_ean_1 = starter.plugins.slim.ean();
        //         //starter._var.slim_img_ean_2 = starter.plugins.slim.receipt();
        //
        //         //
        //         //img_receipt
        //     },
        //     execute: function (element) {
        //         if ($(".slim.slim_" + element).length) {
        //             if (element == "img_receipt_1") {
        //                 var tLabel = "Dodaj zdjęcie dowodu zakupu";
        //             }
        //             if (element == "img_ean_1") {
        //                 var tLabel =
        //                     "Dodaj zdjęcie <strong><u>WYCIĘTEGO</u></strong> kodu kreskowego";
        //             }
        //             if (element == "img_ean_2") {
        //                 var tLabel =
        //                     "Dodaj zdjęcie <strong><u>WYCIĘTEGO</u></strong> kodu kreskowego";
        //             }
        //
        //             return $(".slim.slim_" + element).slim({
        //                 download: false,
        //                 label: tLabel,
        //                 buttonConfirmLabel: "Zapisz",
        //                 buttonCancelLabel: "Anuluj",
        //                 size: "768,768",
        //                 minSize: "512,512",
        //                 maxFileSize: "10",
        //                 saveInitialImage: true,
        //                 instantEdit: true,
        //                 didInit: function (data) {
        //                     $(".slim input[name=" + element + "]").val(
        //                         $("input[name=slim_" + element + "]").val()
        //                     );
        //                 },
        //                 didConfirm: function () {
        //                     $(".slim.slim_" + element).removeClass("invalid");
        //                     return true;
        //                 },
        //             });
        //         } else {
        //             return null;
        //         }
        //     },
        // },

        // owl: {
        //     init: function (selector) {
        //         if ($(selector).length) {
        //             $(selector).owlCarousel({
        //                 loop: true,
        //                 margin: 0,
        //                 nav: true,
        //                 dots: false,
        //                 navText: ["<span></span>", "<span></span>"],
        //                 items: 1,
        //                 lazyLoad: true,
        //                 onInitialize: function (event) {
        //                     console.log("onInitialize");
        //                 },
        //                 onInitialized: function (event) {
        //                     console.log("onInitialized");
        //                 },
        //                 onResize: function (event) {
        //                     console.log("onResize");
        //                 },
        //                 onResized: function (event) {
        //                     console.log("onResized");
        //                 },
        //                 onRefresh: function (event) {
        //                     console.log("onRefresh");
        //                 },
        //                 onRefreshed: function (event) {
        //                     console.log("onRefreshed");
        //                 },
        //                 onDrag: function (event) {
        //                     console.log("onDrag");
        //                 },
        //                 onDragged: function (event) {
        //                     console.log("onDragged");
        //                 },
        //                 onTranslate: function (event) {
        //                     console.log("onTranslate");
        //                 },
        //                 onTranslated: function (event) {
        //                     console.log("onTranslated");
        //                 },
        //                 onChange: function (event) {
        //                     console.log("onChange");
        //                 },
        //                 onChanged: function (event) {
        //                     console.log("onChanged");
        //                 },
        //                 onLoadLazy: function (event) {
        //                     console.log("onLoadLazy");
        //                 },
        //                 onLoadedLazy: function (event) {
        //                     console.log("onLoadedLazy");
        //                 },
        //                 onPlayVideo: function (event) {
        //                     console.log("onPlayVideo");
        //                 },
        //                 onStopVideo: function (event) {
        //                     console.log("onStopVideo");
        //                 },
        //             });
        //         }
        //     },
        // },
    },

    getFields: function ($form) {
        const inputs = $form.find('.input');
        const textareas = $form.find('.textarea');
        const checkboxes = $form.find('.checkbox');
        const files = $form.find('.file');

        const fields = {};

        $.each(inputs, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(textareas, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(checkboxes, function (index, item) {
            if ($(item).prop('checked')) {
                fields[$(item).attr('name')] = $(item).val();
            }
        });

        $.each(files, function (index, item) {
            if (item.files[0]) {
                fields[$(item).attr('name')] = item.files[0];
            }
        })

        fields['_token'] = $form.find('input[name=_token]').val();

        return fields;
    },

    selectorSupported: {
        check: function (selector) {
            var support,
                link,
                sheet,
                doc = document,
                root = doc.documentElement,
                head = root.getElementsByTagName("head")[0],
                impl = doc.implementation || {
                    hasFeature: function () {
                        return false;
                    },
                },
                link = doc.createElement("style");
            link.type = "text/css";

            (head || root).insertBefore(link, (head || root).firstChild);

            sheet = link.sheet || link.styleSheet;

            if (!(sheet && selector)) return false;

            support = impl.hasFeature("CSS2", "")
                ? function (selector) {
                    try {
                        sheet.insertRule(selector + "{ }", 0);
                        sheet.deleteRule(sheet.cssRules.length - 1);
                    } catch (e) {
                        return false;
                    }
                    return true;
                }
                : function (selector) {
                    sheet.cssText = selector + " { }";
                    return (
                        sheet.cssText.length !== 0 &&
                        !/unknown/i.test(sheet.cssText) &&
                        sheet.cssText.indexOf(selector) === 0
                    );
                };

            return support(selector);
        },
    },

    // wow: {
    //     init: function () {
    //         var wow = new WOW({
    //             boxClass: "wow", // animated element css class (default is wow)
    //             animateClass: "animated", // animation css class (default is animated)
    //             offset: 0, // distance to the element when triggering the animation (default is 0)
    //             mobile: true, // trigger animations on mobile devices (default is true)
    //             live: true, // act on asynchronously loaded content (default is true)
    //             callback: function (box) {
    //                 // the callback is fired every time an animation is started
    //                 // the argument that is passed in is the DOM node being animated
    //             },
    //             scrollContainer: null, // optional scroll container selector, otherwise use window,
    //             resetAnimation: true, // reset animation on end (default is true)
    //         });
    //         wow.init();
    //     },
    // },

    // webp: {
    //     init: function ($bool) {
    //         /*
    //         Modernizr.on("webp", function (result) {
    //             if (result) {
    //                 $("img:not(.owl-lazy)").unveil(200, $bool);
    //             } else {
    //                 $("img:not(.owl-lazy)").unveil(200, false);
    //             }
    //         });
    //         */
    //         if (Modernizr.webp) {
    //             $("img:not(.owl-lazy)").unveil(200, $bool);
    //         } else {
    //             $("img:not(.owl-lazy)").unveil(200, false);
    //         }
    //     },
    // },

    autoscroll: {
        init: function () {
            starter.scrollOrLink(window.location.pathname);

            // console.log($(window).scrollTop());

            // setTimeout(function () {
            //     let wst = $(window).scrollTop();
            //     $("html, body").animate({ scrollTop: wst + 1 }, 300);
            // }, 1000);
        },

        getElementDomByURL: function ($url) {
            switch ($url) {
                case "/kontakt/":
                    return "#kontakt";
                    break;
                case "/poznaj-nasze-produkty/":
                    return "#kategorie-produktow";
                    break;
                case "/jak-odebrac-gratis/":
                    return "#gratis";
                    break;
                default:
                    return false;
            }
        },
    },

    scrollOrLink: function (element) {
        var attri = starter.autoscroll.getElementDomByURL(element);

        console.log(attri);

        if (attri !== false && $(attri).length > 0) {
            setTimeout(function () {
                $("html, body").animate(
                    { scrollTop: Math.abs($(attri).position().top) },
                    500,
                    function () {
                        $("html, body").animate(
                            { scrollTop: Math.abs($(attri).position().top) },
                            500
                        );
                    }
                );
            }, 300);

            return false;
        } else {
            setTimeout(function () {
                let wst = $(window).scrollTop();
                $("html, body").animate({ scrollTop: wst + 1 }, 300);
            }, 300);
        }

        return true;
    },

    mouseEnter: function () {
        $(document).on("mouseenter", ".products .product .product-body", function () {
            $(this).addClass("hover");
        });
    },

    mouseLeave: function () {
        $(document).on("mouseleave", ".products .product .product-body", function () {
            $(this).removeClass("hover");
        });
    },

    formStyled: function () {
        $(".input")
            .find("~ .error:not(:empty)")
            .siblings(".input")
            .addClass("no-value");

        $('.input:not(.select):not([value=""])').addClass("valid");

        $(".textarea")
            .find("~ .error:not(:empty)")
            .siblings(".textarea")
            .addClass("no-value"); ;
        $(".textarea:not(:empty)").addClass("valid");

        // $(".checkbox")
        //     .parent()
        //     .find("~ .error:not(:empty)")
        //     .siblings(".label")
        //     .find(".checkbox")
        //     .addClass("invalid");

        // $(".select").find('option[value=""]:checked').parent().addClass("empty");

        // $("#buy_at").datepicker({
        //     minDate: new Date(2021, 9, 18),
        //     maxDate: new Date(2022, 0, 31),
        //     dateFormat: "dd-mm-yy",
        //     onSelect: function (value, date) {
        //         $(this).removeClass("invalid").addClass("valid");
        //     },
        // });
    },

    validator: {
        isName: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 3 || value.length > 128) {
                return `Pole ${name} musi mieć od 3 do 128 znaków.`;
            } else if (!/^[\p{L}\s-]+$/u.test(value)) {
                return `Pole ${name} może zawierać tylko litery.`;
            } else {
                return true;
            }
        },
        isAddress: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length > 255) {
                return `Pole ${name} może mieć maksymalnie 255 znaków.`;
            } else {
                return true;
            }
        },
        isAddressNb: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length > 32) {
                return `Pole ${name} może mieć maksymalnie 32 znaki.`;
            } else {
                return true;
            }
        },
        isCity: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 2 || value.length > 64) {
                return `Pole ${name} musi mieć od 2 do 64 znaków.`;
            } else {
                return true;
            }
        },
        isZip: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^[0-9]{2}-[0-9]{3}$/.test(value)) {
                return 'Wprowadź poprawny kod pocztowy.';
            } else {
                return true;
            }
        },
        isVoivodeship: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 16) {
                return 'Wybierz województwo.';
            } else {
                return true;
            }
        },
        isPhone: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/.test(value)) {
                return 'Wprowadź poprawny numer telefonu.';
            } else {
                return true;
            }
        },
        isEmail: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length > 255) {
                return `Pole ${name} może mieć maksymalnie 255 znaków.`;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                return 'Wprowadź poprawny adres email.';
            } else {
                return true;
            }
        },
        isProduct: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 42) {
                return 'Wybierz produkt.';
            } else {
                return true;
            }
        },
        isShop: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 28) {
                return 'Wybierz rodzaj sklepu.';
            } else {
                return true;
            }
        },
        isReceiptNumber: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 1 || value.length > 128) {
                return `Pole ${name} musi mieć od 1 do 128 znaków.`;
            } else {
                return true;
            }
        },
        isFree: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 3) {
                return 'Wybierz gratis.';
            } else {
                return true;
            }
        },
        isWhere: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 8) {
                return 'Wybierz opcje.';
            } else {
                return true;
            }
        },
        isLegal: (item, name) => {
            if (item.val() === "") {
                return `Pole jest wymagane.`;
            } else if (!item.prop('checked')) {
                return `Pole jest wymagane.`;
            } else {
                return true;
            }
        },
        isNumber: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^\d{1,8}$/.test(value)) {
                return 'Wprowadź poprawną wartość.';
            } else {
                return true;
            }
        },
        isURL: (value, name) => {
            const urlPattern = /^(https?:\/\/)?([\w.-]+)\.([a-z]{2,})(\/\S*)?$/i;
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!urlPattern.test(value)) {
                return 'Wprowadź poprawny adres URL.';
            } else {
                return true;
            }
        },
        isContent: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 3 || value.length > 2048) {
                return `Pole ${name} musi mieć od 3 do 2048 znaków.`;
            } else {
                return true;
            }
        },
    },
};
