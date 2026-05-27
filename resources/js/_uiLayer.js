export function uiLayerHandler(){
    // 🔥 Глобальный store (single source of truth)
    Alpine.store('uiLayer', {
        open: {
            overlay: false,
        },
        current: null, // 'reg' | 'auth' | 'forg_psw'| 'callback'
        // 🔹 окна

        openScreen(name) {
            this.open.overlay = true
            this.current = name
        },

        closeScreen() {
            this.open.overlay = false
            this.current = null
        },
        
        openOverlay(){
            this.open.overlay = true
            this.current = null
        },

        isOpen(name) {
            return this.current === name
        },

        // 🔹 сообщения
        showMessage(text, type='success', timeout=3000) {
            this.message.text = text
            this.message.show = true
            this.message.type = type
            setTimeout(() => {
                this.message.show = false
                this.message.text = ''
            }, timeout)
        },
        // 🔹 state
        message: {
            text: '',
            show: false,
            type: 'success', // success | error | info          
        }, 
        handleResPsw(){
            this.showMessage('Введите и подтвердите новый пароль', 'info')
        },               
        get styles() {
            return {
                'bg-green-100 text-green-800 border-green-300': this.message.type === 'success',
                'bg-red-100 text-red-800 border-red-300': this.message.type === 'error',
                'bg-blue-100 text-blue-800 border-blue-300': this.message.type === 'info'
            }
        },     
    })
}