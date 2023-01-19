class CarousselAdvices extends Caroussel {
    infinite_slide() {
        let offset = this.options.slidesVisible - 1;
        if (offset > this.items.length) {
            offset = this.items.length - 1;
        }
        this.items = [
            ...this.items.slice(this.items.length - offset).map(item => item.cloneNode(true)),
            ...this.items,
            ...this.items.slice(0, offset).map(item => item.cloneNode(true)),
        ]
        this.goToItem(offset, true)
    }
}

document.addEventListener('DOMContentLoaded', function () {
    let element = document.querySelector('#adviceCaroussel_Stagiaire')
    new Caroussel(element, { slidesVisible: 2 })
})

document.addEventListener('DOMContentLoaded', function () {
    let element = document.querySelector('#adviceCaroussel_Formateur')
    new Caroussel(element, { slidesVisible: 2 })
})
