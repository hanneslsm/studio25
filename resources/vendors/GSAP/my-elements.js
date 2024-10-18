import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap-trial/all";



gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

gsap.to('.my-elements', {
	x: "-100%",
	duration: .5,
	scrollTrigger: {
		markers: true,
		start: "center center",
		end: "center center",
		toggleActions: "play restart reverse",
		trigger: ".trigger"
	}
})



// Initialize ScrollSmoother
ScrollSmoother.create({
    wrapper: "#smooth-wrapper",
    content: "#smooth-content",
    smooth: 1, // smoothness (0 = no smoothing)
    effects: true, // looks for data-speed and data-lag attributes on elements
});
