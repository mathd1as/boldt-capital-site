const app = {
	main: {
		init: () => {
			app.common.init()
			app.blocks.init();
			app.pages.init();
		},
	},

	common: {
		init: () => {
			// js que roda em todos os lugares do site
			const toggleMobileNav = () => {
				$("#masthead .hamburger").toggleClass("is-active")
				$("#masthead .mobile-nav").toggleClass("is-active")
			}
			$("#masthead .hamburger").click(toggleMobileNav)
		}
	},

	blocks: {
		init: () => {
			if ($(".lazyblock-homehero").length > 0)
				app.blocks.setupHomeHero()
		},
		setupHomeHero: () => {
			// js necessario apenas no bloco homehero
		}
	},

	pages: {
		init: () => {
			if ($("body").hasClass("single"))
				app.pages.setupSingle();
		},
		setupSingle: () => {
			// js necessario apenas na single
		}
	}
}


const getBreakpoint = () => {
	return window.getComputedStyle(document.querySelector("body"), ":before").getPropertyValue("content").replace(/\"/g, "");
};

$ = jQuery.noConflict();
$(app.main.init)