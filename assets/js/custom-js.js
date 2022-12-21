class Caroussel {
    constructor(element, options = {}) {
        this.element = element;
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 3,
            infinite: true,
            autoplay: true,
            speed: 300
        }, options);

        let children = [].slice.call(element.children)
        this.currentItem = 0;
        this.root = this.createDivWithClass('caroussel')

        this.container = this.createDivWithClass('caroussel_container')

        this.root.appendChild(this.container)

        this.element.appendChild(this.root)
        this.items = children.map((child) => {
            let item = this.createDivWithClass('caroussel_item')
            item.appendChild(child)
            this.container.appendChild(item)
            return item
        })
        this.setStyle()
        this.createNavigation()
    }

    /**
     * For create div class element
     */
    createDivWithClass(className) {
        let div = document.createElement('div')
        div.setAttribute('class', className)
        return div
    }

    /**
     * Apply the right size to a given element
     */
    setStyle() {
        let ratio = this.items.length / this.options.slidesVisible
        this.container.style.width = (ratio * 100) + "%"
        this.items.forEach(item => item.style.width = ((100 / this.options.slidesVisible) / ratio) + "%")
    }

    /**
     * Create next button and prev button in the DOM for navigate in caroussel
     * Add listener to click on they button
     */
    createNavigation() {
        let nextButton = this.createDivWithClass('caroussel_next')
        let prevButton = this.createDivWithClass('caroussel_prev')
        this.root.appendChild(nextButton)
        this.root.appendChild(prevButton)
        nextButton.addEventListener('click', this.next.bind(this))
        prevButton.addEventListener('click', this.prev.bind(this))
    }

    /**
     * Make the caroussel go to the right
     */
    next() {
        this.goToItem(this.currentItem + this.options.slidesToScroll)
    }

    /**
     * Make the caroussel go to the left
     */
    prev() {
        this.goToItem(this.currentItem - this.options.slidesToScroll)
    }

    /**
     * Manages the movement of the carousel and
     * Manages the return to the beginning if there is no more image
     */
    goToItem(index) {
        if (index < 0) {
            index = this.items.length - this.options.slidesVisible
        } else if (index >= this.items.length || (this.items[this.currentItem + this.options.slidesVisible] === undefined && index > this.currentItem)) {
            index = 0;
        }

        let translateX = index * -100 / this.items.length
        this.container.style.transform = 'translate3d(' + translateX + '% ,0 ,0)'
        this.currentItem = index
    }

    get slidesToScroll() {

    }

    get slidesVisible() {

    }
}

/**
 * Create caroussel element where the DOM is Loaded
 */
document.addEventListener('DOMContentLoaded', function() {
    new Caroussel(document.querySelector('#container'), {})
})


/* class Caroussel {
    constructor(element, options = {}){
        this.element = element;
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 3
        }, options)
    }
}

document.addEventListener('DOMContentLoaded', function(){

    console.log("charger")
    new Caroussel(document.querySelector('#caroussel'), {
        infinite: true,
        autoplay: true,
    })
}) */


/* $(document).ready(function () {
    $('.caroussel').slick();
});

 */
/*
        dots: true,
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        speed: 300,

responsive: [{
            breakpoint: 1024,
            settings: {
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]*/