import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import Flip from "gsap/Flip";


gsap.registerPlugin(ScrollTrigger);

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


