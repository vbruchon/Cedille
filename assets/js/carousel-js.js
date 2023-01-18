class Caroussel {
    constructor(element, options = {}) {
        this.element = element;
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 3,
            infinite: true,
            autoPlayer: true
        }, options);
        this.isMobile = false
        this.isTablett = false
        this.currentItem = 5

        let children = [].slice.call(this.element.children)
        this.root = this.createDivWithClass('caroussel')
        this.container = this.createDivWithClass('caroussel_container')
        this.root.appendChild(this.container)
        this.element.appendChild(this.root)
        this.moveCallbacks = []
        this.items = children.map((child) => {
            let item = this.createDivWithClass('caroussel_item')
            item.appendChild(child)
            return item
        })

        if (this.options.infinite) {
            let offset = this.options.slidesVisible * 2 - 1
            this.items = [
                ...this.items.slice(this.items.length - offset).map(item => item.cloneNode(true)),
                ...this.items,
                ...this.items.slice(0, offset).map(item => item.cloneNode(true)),
            ]
            this.goToItem(offset, true)
        }

        this.items.forEach(item => this.container.appendChild(item))

        this.setStyle()
        this.createNavigation()
        this.moveCallbacks.forEach(cb => cb(this.currentItem))
        this.autoPlay()
        this.resizeWindow()
        window.addEventListener('resize', this.resizeWindow.bind(this))
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
        let ratio = this.items.length / this.slidesVisible
        this.container.style.width = (ratio * 100) + "%"
        this.items.forEach(item => item.style.width = ((100 / this.slidesVisible) / ratio) + "%")
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
        this.goToItem(this.currentItem + this.slidesToScroll)
    }

    /**
     * Make the caroussel go to the left
     */
    prev() {
        this.goToItem(this.currentItem - this.slidesToScroll)
    }

    /**
     * Manages the movement of the carousel and
     * Manages the return to the beginning if there is no more image
     */
    goToItem(index, animation = true) {
        if (index < 0) {
            index = this.items.length - this.options.slidesVisible
        } else if (index >= this.items.length || (this.items[this.currentItem + this.options.slidesVisible] === undefined && index > this.currentItem)) {
            index = 0;
        }

        let translateX = index * -100 / this.items.length
        if (animation == false) {
            this.container.style.transition = 'none'
        }
        this.container.style.transform = 'translate3d(' + translateX + '% ,0 ,0)'
        if (animation == false) {
            this.container.style.transition = ''
        }
        this.currentItem = index
        this.moveCallbacks.forEach(cb => cb(index))
    }

    onMove(cb) {
        this.moveCallbacks.push(cb)
    }

    get slidesToScroll() {
        if (this.isMobile === true) {
            return 1
        } else if (this.isTablett === true) {
            return 2
        } else {
            return this.options.slidesToScroll
        }
    }

    get slidesVisible() {
        if (this.isMobile === true) {
            return 1
        } else if (this.isTablett === true) {
            return 2
        } else {
            return this.options.slidesVisible
        }
    }

    resizeWindow() {
        let mobile = window.innerWidth < 800
        let tablett = window.innerWidth < 1100

        if (mobile !== this.isMobile) {
            this.isMobile = mobile
            this.setStyle()
        } else if (tablett !== this.isTablett) {
            this.isTablett = tablett
            this.setStyle()
        }
    }

    /**
     * Loop on the all element for continuous scrolling
     */

    /*
     *Make autoscroll every 2seconde  
     */
    autoPlay() {
        if (this.options.autoPlayer) {
            let autoNext = setInterval(() => {
                this.next()
            }, 2000)
        }
    }
}

/**
 * Create caroussel element where the DOM is Loaded
 */
document.addEventListener('DOMContentLoaded', function () {
    let element = document.querySelector('#container')
    new Caroussel(element, {})
})

document.addEventListener('DOMContentLoaded', function () {
    let element = document.querySelector('#adviceCaroussel_Stagiaire')
    new Caroussel(element, { slidesVisible: 2 })
})

document.addEventListener('DOMContentLoaded', function () {
    let element = document.querySelector('#adviceCaroussel_Formateur')
    new Caroussel(element, { slidesVisible: 2 })
})
