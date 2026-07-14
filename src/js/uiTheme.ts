/**
 * Theme management system for dark/light mode switching
 * Follows system preferences and allows manual toggle with persistence
 */

type Theme = 'dark' | 'light';

interface ThemeConfig {
  storageKey: string;
  systemPreferenceQuery: string;
}

class ThemeManager {
  private currentTheme: Theme;
  private readonly config: ThemeConfig;
  private readonly htmlElement: HTMLElement;
  private systemPreferenceMediaQuery: MediaQueryList;
  private listeners: Set<(theme: Theme) => void> = new Set();

  constructor(config: Partial<ThemeConfig> = {}) {
    this.config = {
      storageKey: config.storageKey || 'goodstate-theme',
      systemPreferenceQuery: config.systemPreferenceQuery || '(prefers-color-scheme: dark)'
    };

    this.htmlElement = document.documentElement;
    this.systemPreferenceMediaQuery = window.matchMedia(this.config.systemPreferenceQuery);
    
    this.currentTheme = this.getInitialTheme();
    this.applyTheme(this.currentTheme);
    this.setupSystemPreferenceListener();
  }

  /**
   * Determines the initial theme based on:
   * 1. Saved user preference (localStorage)
   * 2. System preference
   * 3. Default to dark
   */
  private getInitialTheme(): Theme {
    const savedTheme = this.getSavedTheme();
    if (savedTheme) {
      return savedTheme;
    }

    return this.getSystemTheme();
  }

  /**
   * Gets the system's preferred theme
   */
  private getSystemTheme(): Theme {
    return this.systemPreferenceMediaQuery.matches ? 'dark' : 'light';
  }

  /**
   * Retrieves saved theme from localStorage
   */
  private getSavedTheme(): Theme | null {
    try {
      const saved = localStorage.getItem(this.config.storageKey);
      if (saved === 'dark' || saved === 'light') {
        return saved;
      }
    } catch (error) {
      console.warn('Failed to read theme from localStorage:', error);
    }
    return null;
  }

  /**
   * Saves theme preference to localStorage
   */
  private saveTheme(theme: Theme): void {
    try {
      localStorage.setItem(this.config.storageKey, theme);
    } catch (error) {
      console.warn('Failed to save theme to localStorage:', error);
    }
  }

  /**
   * Applies theme to the HTML element
   */
  private applyTheme(theme: Theme): void {
    this.htmlElement.setAttribute('data-theme', theme);
    this.currentTheme = theme;
  }

  /**
   * Sets up listener for system theme preference changes
   */
  private setupSystemPreferenceListener(): void {
    const handler = (event: MediaQueryListEvent): void => {
      if (!this.getSavedTheme()) {
        const newTheme: Theme = event.matches ? 'dark' : 'light';
        this.applyTheme(newTheme);
        this.notifyListeners(newTheme);
      }
    };

    this.systemPreferenceMediaQuery.addEventListener('change', handler);
  }

  /**
   * Notifies all registered listeners of theme changes
   */
  private notifyListeners(theme: Theme): void {
    this.listeners.forEach(listener => listener(theme));
  }

  /**
   * Gets the current active theme
   */
  public getCurrentTheme(): Theme {
    return this.currentTheme;
  }

  /**
   * Toggles between dark and light themes
   */
  public toggleTheme(): Theme {
    const newTheme: Theme = this.currentTheme === 'dark' ? 'light' : 'dark';
    this.setTheme(newTheme);
    return newTheme;
  }

  /**
   * Sets a specific theme
   */
  public setTheme(theme: Theme): void {
    this.saveTheme(theme);
    this.applyTheme(theme);
    this.notifyListeners(theme);
  }

  /**
   * Resets to system preference
   */
  public resetToSystem(): void {
    localStorage.removeItem(this.config.storageKey);
    const systemTheme = this.getSystemTheme();
    this.applyTheme(systemTheme);
    this.notifyListeners(systemTheme);
  }

  /**
   * Registers a callback for theme changes
   */
  public onThemeChange(callback: (theme: Theme) => void): () => void {
    this.listeners.add(callback);
    
    return () => {
      this.listeners.delete(callback);
    };
  }
}

/**
 * Draggable theme toggle button component
 */
class DraggableThemeButton {
  private readonly button: HTMLElement;
  private readonly themeManager: ThemeManager;
  private isDragging: boolean = false;
  private startX: number = 0;
  private startY: number = 0;
  private initialLeft: number = 0;
  private initialTop: number = 0;

  constructor(themeManager: ThemeManager, options: { initialX?: number; initialY?: number } = {}) {
    this.themeManager = themeManager;
    
    const button = this.createButton();
    this.button = button;
    
    const initialX = options.initialX ?? window.innerWidth - 80;
    const initialY = options.initialY ?? window.innerHeight / 2;
    
    this.button.style.left = `${initialX}px`;
    this.button.style.top = `${initialY}px`;
    
    this.setupDragEvents();
    this.setupThemeToggle();
    
    document.body.appendChild(this.button);
  }

  /**
   * Creates the theme toggle button element
   */
  private createButton(): HTMLElement {
    const button = document.createElement('button');
    button.setAttribute('aria-label', 'Toggle theme');
    button.className = 'theme-toggle-button';
    
    Object.assign(button.style, {
      position: 'fixed',
      width: '50px',
      height: '50px',
      borderRadius: '50%',
      border: '1px solid rgba(255, 255, 255, 0.2)',
      cursor: 'move',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'center',
      zIndex: '9999',
      transition: 'transform 0.2s ease, box-shadow 0.2s ease',
      backgroundColor: 'rgba(255, 255, 255, 0.1)',
      backdropFilter: 'blur(10px)',
      WebkitBackdropFilter: 'blur(10px)',
      color: 'var(--text-primary, #e5e5e5)',
      boxShadow: '0 8px 32px rgba(0, 0, 0, 0.3)',
      userSelect: 'none',
      touchAction: 'none'
    });

    const theme = this.themeManager.getCurrentTheme();
    button.innerHTML = theme === 'dark' ? this.getSunIcon() : this.getMoonIcon();
    
    this.themeManager.onThemeChange(() => {
      if (this.button) {
        const currentTheme = this.themeManager.getCurrentTheme();
        this.button.innerHTML = currentTheme === 'dark' ? this.getSunIcon() : this.getMoonIcon();
      }
    });
    
    return button;
  }

  /**
   * Returns SVG icon for sun (light mode)
   */
  private getSunIcon(): string {
    return `
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="5"></circle>
        <line x1="12" y1="1" x2="12" y2="3"></line>
        <line x1="12" y1="21" x2="12" y2="23"></line>
        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
        <line x1="1" y1="12" x2="3" y2="12"></line>
        <line x1="21" y1="12" x2="23" y2="12"></line>
        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
      </svg>
    `;
  }

  /**
   * Returns SVG icon for moon (dark mode)
   */
  private getMoonIcon(): string {
    return `
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
      </svg>
    `;
  }

  /**
   * Sets up mouse/touch events for dragging
   */
  private setupDragEvents(): void {
    this.button.addEventListener('mousedown', this.handleDragStart.bind(this));
    document.addEventListener('mousemove', this.handleDragMove.bind(this));
    document.addEventListener('mouseup', this.handleDragEnd.bind(this));

    this.button.addEventListener('touchstart', this.handleDragStart.bind(this), { passive: false });
    document.addEventListener('touchmove', this.handleDragMove.bind(this), { passive: false });
    document.addEventListener('touchend', this.handleDragEnd.bind(this));
  }

  /**
   * Handles drag start
   */
  private handleDragStart(event: MouseEvent | TouchEvent): void {
    this.isDragging = true;
    
    const clientX = 'touches' in event ? event.touches[0].clientX : event.clientX;
    const clientY = 'touches' in event ? event.touches[0].clientY : event.clientY;
    
    this.startX = clientX;
    this.startY = clientY;
    
    const rect = this.button.getBoundingClientRect();
    this.initialLeft = rect.left;
    this.initialTop = rect.top;
    
    this.button.style.transition = 'none';
    this.button.style.cursor = 'grabbing';
    
    if ('touches' in event) {
      event.preventDefault();
    }
  }

  /**
   * Handles drag move
   */
  private handleDragMove(event: MouseEvent | TouchEvent): void {
    if (!this.isDragging) return;
    
    const clientX = 'touches' in event ? event.touches[0].clientX : event.clientX;
    const clientY = 'touches' in event ? event.touches[0].clientY : event.clientY;
    
    const deltaX = clientX - this.startX;
    const deltaY = clientY - this.startY;
    
    const newLeft = this.initialLeft + deltaX;
    const newTop = this.initialTop + deltaY;
    
    const maxLeft = window.innerWidth - this.button.offsetWidth;
    const maxTop = window.innerHeight - this.button.offsetHeight;
    
    const constrainedLeft = Math.max(0, Math.min(newLeft, maxLeft));
    const constrainedTop = Math.max(0, Math.min(newTop, maxTop));
    
    this.button.style.left = `${constrainedLeft}px`;
    this.button.style.top = `${constrainedTop}px`;
    
    if ('touches' in event) {
      event.preventDefault();
    }
  }

  /**
   * Handles drag end
   */
  private handleDragEnd(): void {
    if (!this.isDragging) return;
    
    this.isDragging = false;
    this.button.style.transition = 'transform 0.2s ease, box-shadow 0.2s ease';
    this.button.style.cursor = 'move';
  }

  /**
   * Sets up theme toggle on click (but not drag)
   */
  private setupThemeToggle(): void {
    let dragOccurred = false;
    let mouseDownTime = 0;

    this.button.addEventListener('mousedown', () => {
      dragOccurred = false;
      mouseDownTime = Date.now();
    });

    this.button.addEventListener('touchstart', () => {
      dragOccurred = false;
      mouseDownTime = Date.now();
    });

    this.button.addEventListener('mousemove', () => {
      dragOccurred = true;
    });

    this.button.addEventListener('touchmove', () => {
      dragOccurred = true;
    });

    this.button.addEventListener('click', (event) => {
      const timeDiff = Date.now() - mouseDownTime;
      
      if (!dragOccurred && timeDiff < 200) {
        event.preventDefault();
        this.themeManager.toggleTheme();
      }
    });
  }

  /**
   * Removes the button from DOM
   */
  public destroy(): void {
    this.button.remove();
  }
}

/**
 * Initializes the theme system
 */
export function initializeTheme(): { themeManager: ThemeManager; toggleButton: DraggableThemeButton } {
  const themeManager = new ThemeManager();
  const toggleButton = new DraggableThemeButton(themeManager);
  
  return { themeManager, toggleButton };
}

export { ThemeManager, DraggableThemeButton };
export type { Theme };
