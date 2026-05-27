export function registerEventBus() {
    window.addEventListener('event-flow', (e) => {
        const { domain, type } = e.detail
        switch (domain) {
            case 'reg-auth':
                handleRegAuth(type, e.detail)
                break
            case 'callback':
                handleCallback(type, e.detail)
                break
        }
    })
    const uiLayer = Alpine.store('uiLayer')   
    
    function handleRegAuth(type, payload) {        
        switch (type) {
            case 'registered':
                uiLayer.openScreen('auth')
                uiLayer.showMessage('Регистрация успешна! Войдите в систему.', 'success')
                break
            case 'authenticated':
                uiLayer.closeScreen()
                uiLayer.showMessage('Вы вошли в систему!', 'success')
                Livewire.dispatch('authChanged')
                break
            case 'logout':
                uiLayer.showMessage('Вы вышли из системы', 'info')
                break
            case 'reset-link-sent':
                uiLayer.closeScreen()
                uiLayer.showMessage('Ссылка отправлена на email', 'success')
                break            
            case 'password-reset':
                uiLayer.openScreen('auth')
                uiLayer.showMessage('Пароль успешно изменён, войдите в систему.', 'success')
                break
            case 'auth-error':
                uiLayer.showMessage('Произошла ошибка авторизации', 'error')
                break                        
        }
    }
    function handleCallback(type, payload) {
        const callback = Alpine.store('callback')
        switch (type) {
            case 'success':
                uiLayer.closeScreen()
                uiLayer.showMessage('Данные получены, в ближайшее время с вами свяжутся.', 'success')
                break          
        }
    }
}