// Theme management
const getPreferredTheme = () => {
    // Check if theme was previously set
    const storedTheme = localStorage.getItem('theme')
    if (storedTheme) {
        return storedTheme
    }
    // Return system preference
    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
}

const setTheme = (theme) => {
    if (theme === 'system') {
        localStorage.removeItem('theme')
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    } else {
        localStorage.setItem('theme', theme)
        if (theme === 'dark') {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    }
    
    updateThemeIcons(theme)
}

const updateThemeIcons = (theme) => {
    const darkIcon = document.getElementById('theme-toggle-dark-icon')
    const lightIcon = document.getElementById('theme-toggle-light-icon')
    const systemIcon = document.getElementById('theme-toggle-system-icon')
    
    if (!darkIcon || !lightIcon || !systemIcon) return
    
    darkIcon.classList.add('hidden')
    lightIcon.classList.add('hidden')
    systemIcon.classList.add('hidden')
    
    if (theme === 'system') {
        systemIcon.classList.remove('hidden')
    } else if (theme === 'dark') {
        lightIcon.classList.remove('hidden')
    } else {
        darkIcon.classList.remove('hidden')
    }
}

// Initialize theme
const initializeTheme = () => {
    // Set initial theme
    const theme = getPreferredTheme()
    setTheme(theme)
    
    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            setTheme('system')
        }
    })
}

// Theme toggle dropdown functionality
const setupThemeToggle = () => {
    const themeToggleBtn = document.getElementById('theme-toggle')
    const themeDropdown = document.getElementById('theme-dropdown')
    
    if (!themeToggleBtn || !themeDropdown) return
    
    themeToggleBtn.addEventListener('click', () => {
        themeDropdown.classList.toggle('hidden')
    })
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!themeToggleBtn.contains(e.target) && !themeDropdown.contains(e.target)) {
            themeDropdown.classList.add('hidden')
        }
    })
    
    // Theme option buttons
    document.querySelectorAll('[data-theme-value]').forEach(button => {
        button.addEventListener('click', () => {
            const theme = button.getAttribute('data-theme-value')
            setTheme(theme)
            themeDropdown.classList.add('hidden')
        })
    })
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    initializeTheme()
    setupThemeToggle()
}) 