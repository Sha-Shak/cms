$(document).ready(function() {

    $('#imageGallery1').lightSlider({

                loop:true,

                keyPress:true,

				item:6,

				thumbMargin: 0,







				galleryMargin: 0,

				thumbMargin: 0,

				speed: 1000, //ms'

				pause: 4000,

				slideMargin: 10,

				auto:false,

				pauseOnHover: true,

				loop:true,

				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

				enableDrag: true,

					pager:false,



responsive : [

            {

                breakpoint:1200,

                settings: {

                    item:5,

                    slideMove:1,

                    slideMargin:0,

                  }

            },

            {

                breakpoint:990,

                settings: {

                    item:5,

                    slideMove:1,

					slideMargin:0,

                  }

            },

            {

                breakpoint:570,

                settings: {

                    item:3,

                    slideMove:1,

					slideMargin:0,

                  }

            }



        ]



    });

	

	

	

	

	

	 $('#contactTypeTabs').lightSlider({

				

				enableDrag: true,

                keyPress:true,

				item:6,

				galleryMargin: 0,

				thumbMargin: 0,

				speed: 1000, //ms'

				pause: 4000,

				slideMargin: 0,

				auto:false,

				pauseOnHover: true,

				loop:false,

				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

				

				pager:false,

				controls:false,



				





responsive : [

            {

                breakpoint:1200,

                settings: {

                    item:5,

                    slideMove:1,

                    slideMargin:0,

                  }

            },

            {

                breakpoint:990,

                settings: {

                    item:5,

                    slideMove:1,

					slideMargin:0,

                  }

            },

            {

                breakpoint:570,

                settings: {

                    item:3,

                    slideMove:1,

					slideMargin:0,

                  }

            }



        ]



    });	

	

	

	

	 $('.contact_history_filter').lightSlider({

				

				enableDrag: true,

                keyPress:true,

				item:6,

				galleryMargin: 0,

				thumbMargin: 0,

				speed: 1000, //ms'

				pause: 4000,

				slideMargin: 0,

				auto:false,

				pauseOnHover: true,

				loop:false,

				easing: 'cubic-bezier(0.25, 0, 0.25, 1)',

				pager:false,

				controls:false,



				





responsive : [

            {

                breakpoint:1600,

                settings: {

                    item:4,

                    slideMove:1,

                    slideMargin:0,

                  }

            },

            {

                breakpoint:1199,

                settings: {

                    item:5,

                    slideMove:1,

                    slideMargin:0,

                  }

            },

            {

                breakpoint:900,

                settings: {

                    item:4,

                    slideMove:1,

					slideMargin:0,

                  }

            },

            {

                breakpoint:770,

                settings: {

                    item:3,

                    slideMove:1,

					slideMargin:0,

                  }

            }



        ]



    });	

	

	

  });