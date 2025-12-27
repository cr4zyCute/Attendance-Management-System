/**
 * API Configuration for Student Pages
 * Automatically detects ngrok vs local environment
 */

const AppConfig = {
    getApiBaseUrl: function() {
        const hostname = window.location.hostname;
        
        // If accessing via ngrok, use the ngrok backend URL
        if (hostname.includes('ngrok')) {
            const ngrokBackendUrl = localStorage.getItem('ngrok_backend_url');
            if (ngrokBackendUrl) {
                return ngrokBackendUrl;
            }
            console.warn('⚠️ ngrok detected but no backend URL configured!');
            console.warn('Run in console: localStorage.setItem("ngrok_backend_url", "https://your-backend-ngrok-url.ngrok-free.app")');
            return `${window.location.protocol}//${hostname}`;
        }
        
        // Local development - use local IP
        return 'http://192.168.1.9:8000';
    },
    
    setNgrokBackendUrl: function(url) {
        localStorage.setItem('ngrok_backend_url', url);
        console.log('✅ ngrok backend URL set to:', url);
    }
};

// Export for use in other scripts
const API_BASE_URL = AppConfig.getApiBaseUrl();