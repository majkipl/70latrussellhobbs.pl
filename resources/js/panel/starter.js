let event;
let height;

// $.fn.hasAttr = function (name) {
//     return this.attr(name) !== undefined;
// };

const starter = {
    _var: {},

    _const: {},

    init: function () {

        starter.click();

        starter.change();

        starter.input();

    },


    change: function () {
    },

    input: function () {
    },

    click: function () {
        /*
		    $('selector').click(function(){

			});
		*/
    },

    resize: function () {
    },
};
$(window).on("load", function (e) {
    event = e || window.event;

    starter.init();
});

