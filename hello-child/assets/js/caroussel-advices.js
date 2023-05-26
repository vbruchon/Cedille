class CarousselAdvices extends Caroussel {
    infinite_slide() {
        let offset = Math.ceil(this.items.length / this.options.slidesVisible);
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
    new CarousselAdvices(element, { slidesVisible: 2 })
})

document.addEventListener('DOMContentLoaded', function () {
    let element = document.querySelector('#adviceCaroussel_Formateur')
    new CarousselAdvices(element, { slidesVisible: 2 })
})
