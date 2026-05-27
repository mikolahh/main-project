export function mobileMenuHandler(){
    Alpine.data('mobileMenu', () => ({
        open: false,
        screen: null,
        show(screen) {
            this.screen = screen
        },
        openMenu() {
            this.open = true
            this.screen = 'main'
        },
        closeMenu() {
            this.open = false
            this.screen = null
        }
    }))
}