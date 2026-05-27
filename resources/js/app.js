import './bootstrap';
import { mobileMenuHandler } from './mobileMenu'
import { uiLayerHandler } from './uiLayer'
import { registerEventBus } from './events'
import Alpine from 'alpinejs';

document.addEventListener('alpine:init', () => {

    // 🔹 Локальные компоненты (ok)
    // подключаем мобильное меню
    mobileMenuHandler()

    // 🔥 Глобальные компоненты    
     
    // 🔥 обработчик пользовательского интерфейса по регистрации и аутентификации 
    // 🔥 подключаем handler uiLayer
    uiLayerHandler()

    // 🔥 ГЛОБАЛЬНЫЙ ОБРАБОТЧИК СОБЫТИЙ (ВАЖНО: один на всё приложение)  
    // 🔥 подключаем event bus
    registerEventBus()
    
    
})
