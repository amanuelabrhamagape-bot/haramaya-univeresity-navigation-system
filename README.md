# 🎓 Campus Navigator

An interactive, GIS-like campus navigation web application built with pure HTML, CSS, and JavaScript. No backend, no APIs, no frameworks - just clean, modern web development.

![Campus Navigator](https://img.shields.io/badge/version-1.0.0-blue.svg)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Technologies](#technologies)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Pages](#pages)
- [Campus Locations](#campus-locations)
- [Browser Support](#browser-support)
- [Contributing](#contributing)
- [License](#license)

## 🌟 Overview

Campus Navigator is a comprehensive web-based solution for campus navigation and exploration. It provides an intuitive interface for students, faculty, and visitors to:

- Explore campus buildings interactively
- Search and filter locations
- Get turn-by-turn directions
- Access detailed information about facilities
- Contact campus services

**Key Highlights:**
- ✅ No installation required
- ✅ Works on all devices (mobile, tablet, desktop)
- ✅ No backend or database needed
- ✅ Fast and responsive
- ✅ Modern, professional design

## ✨ Features

### 🗺️ Interactive Map
- **Clickable SVG map** with all major campus buildings
- **Color-coded locations** for easy identification
- **Hover effects** and smooth animations
- **Zoom controls** for detailed viewing
- **Dynamic information panels** with building details

### 🔍 Smart Search
- **Real-time search** with instant results
- **Filter by category** (Academic, Services, Facilities)
- **Search suggestions** as you type
- **Fuzzy matching** for flexible queries
- **No results handling** with helpful messages

### 🧭 Directions System
- **Turn-by-turn directions** between any two locations
- **Distance and time estimates** for each route
- **Step-by-step instructions** with visual indicators
- **Popular routes** for quick access
- **Swap locations** with one click
- **URL parameter support** for sharing directions

### 📝 Contact Form
- **Real-time validation** for all fields
- **Email format checking** with regex
- **Character counter** for message field
- **Auto-save drafts** using localStorage
- **Success/error messages** with animations
- **Accessible form design**

### 📱 Responsive Design
- **Mobile-first approach** for optimal mobile experience
- **Hamburger menu** for small screens
- **Touch-friendly** interface
- **Adaptive layouts** for all screen sizes
- **Smooth animations** and transitions

### 🎨 Modern UI/UX
- **Professional color scheme** with gradients
- **Clean typography** and spacing
- **Card-based layouts** with hover effects
- **Icon integration** with Font Awesome
- **Smooth scrolling** and animations
- **Loading states** and feedback

## 🛠️ Technologies

### Frontend
- **HTML5** - Semantic markup
- **CSS3** - Modern styling with Grid, Flexbox, animations
- **JavaScript (ES6+)** - Interactive functionality
- **SVG** - Scalable vector graphics for map

### Libraries
- **Font Awesome 6.0** - Icon library (CDN)

### Features Used
- CSS Variables for theming
- CSS Grid & Flexbox for layouts
- CSS Animations & Transitions
- JavaScript ES6+ features (arrow functions, template literals, etc.)
- LocalStorage API for data persistence
- Intersection Observer API for scroll animations
- URLSearchParams for URL handling

## 📁 Project Structure

```
campus-navigator/
│
├── index.html              # Home page with hero and features
├── about.html              # About page with project info
├── map.html                # Interactive campus map
├── locations.html          # All locations with search
├── directions.html         # Direction finder
├── contact.html            # Contact form
│
├── css/
│   └── style.css          # Main stylesheet (1000+ lines)
│
├── js/
│   ├── main.js            # Core functionality and data
│   ├── map.js             # Map interactions and zoom
│   ├── search.js          # Search and filter logic
│   ├── directions.js      # Route generation
│   └── contact.js         # Form validation
│
├── README.md              # This file
└── PRESENTATION_SCRIPT.md # Presentation guide
```

## 🚀 Installation

### Option 1: Direct Download
1. Download or clone this repository
2. Open `index.html` in your web browser
3. That's it! No build process required.

### Option 2: Local Server (Recommended)
For the best experience, use a local web server:

**Using Python:**
```bash
# Python 3
python -m http.server 8000

# Python 2
python -m SimpleHTTPServer 8000
```

**Using Node.js:**
```bash
npx http-server -p 8000
```

**Using PHP:**
```bash
php -S localhost:8000
```

Then open `http://localhost:8000` in your browser.

### Option 3: VS Code Live Server
1. Install the "Live Server" extension in VS Code
2. Right-click on `index.html`
3. Select "Open with Live Server"

## 💻 Usage

### Navigation
- Use the top navigation menu to switch between pages
- On mobile, click the hamburger icon to open the menu

### Interactive Map
1. Go to the "Interactive Map" page
2. Click on any building marker to view details
3. Use zoom controls to zoom in/out
4. Click the X button to close the details panel

### Search Locations
1. Go to the "Locations" page
2. Type in the search bar to filter locations
3. Use category buttons to filter by type
4. Click "View on Map" or "Get Directions" on any card

### Get Directions
1. Go to the "Directions" page
2. Select your starting location
3. Select your destination
4. Click "Get Directions"
5. View turn-by-turn instructions
6. Or click on a popular route card for quick directions

### Contact Form
1. Go to the "Contact" page
2. Fill in your name, email, and message
3. Form validates in real-time
4. Click "Send Message"
5. Your draft is auto-saved in case you navigate away

## 📄 Pages

### 1. Home (`index.html`)
- Hero section with call-to-action
- Key features overview
- Quick access to all locations
- Footer with links

### 2. About (`about.html`)
- Project mission and goals
- Feature list
- Technology stack
- Statistics and metrics

### 3. Interactive Map (`map.html`)
- SVG campus map
- Clickable building markers
- Information panel
- Map legend
- Zoom controls

### 4. Locations (`locations.html`)
- All campus locations in card format
- Search bar with live filtering
- Category filters
- Detailed information for each location
- Links to map and directions

### 5. Directions (`directions.html`)
- Direction form with dropdowns
- Swap locations button
- Turn-by-turn instructions
- Popular routes section
- Distance and time estimates

### 6. Contact (`contact.html`)
- Contact form with validation
- Contact information cards
- Office hours
- Social media links
- FAQ section

## 🏛️ Campus Locations

### Library
- **Location:** North Campus, Building A
- **Hours:** Mon-Fri 8AM-10PM, Sat-Sun 10AM-8PM
- **Features:** 100,000+ books, computer labs, study rooms
- **Services:** Book lending, research assistance, printing

### Cafeteria
- **Location:** East Campus, Building B
- **Hours:** Mon-Sun 7AM-9PM
- **Features:** Multiple food stations, vegetarian options
- **Services:** Meal plans, catering, mobile ordering

### Admin Building
- **Location:** Central Campus, Main Building
- **Hours:** Mon-Fri 9AM-5PM
- **Features:** Registrar, financial aid, admissions
- **Services:** Registration, transcripts, counseling

### Dormitories
- **Location:** West Campus, Residential Area
- **Hours:** 24/7 for residents
- **Features:** Single/double rooms, common areas, security
- **Services:** Housing applications, maintenance, events

### Science Labs
- **Location:** South Campus, Science Complex
- **Hours:** Mon-Fri 8AM-8PM, Sat 10AM-4PM
- **Features:** Biology, chemistry, physics labs
- **Services:** Lab courses, research, equipment training

## 🌐 Browser Support

Campus Navigator works on all modern browsers:

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

**Note:** Internet Explorer is not supported.

## 📱 Responsive Breakpoints

- **Mobile:** < 768px
- **Tablet:** 768px - 1024px
- **Desktop:** > 1024px

## 🎨 Color Scheme

```css
--primary-color: #2563eb;    /* Blue */
--secondary-color: #7c3aed;  /* Purple */
--accent-color: #f59e0b;     /* Orange */
--success-color: #10b981;    /* Green */
--danger-color: #ef4444;     /* Red */
--dark-color: #1f2937;       /* Dark Gray */
--light-color: #f3f4f6;      /* Light Gray */
--text-color: #374151;       /* Text Gray */
```

## 🔧 Customization

### Adding New Locations

1. Open `js/main.js`
2. Add a new entry to the `campusLocations` object:

```javascript
newBuilding: {
    name: 'New Building',
    icon: 'fa-building',
    color: '#your-color',
    description: 'Description here',
    details: {
        location: 'Campus area',
        hours: 'Operating hours',
        phone: '(555) 123-4567',
        email: 'email@campus.edu'
    },
    features: ['Feature 1', 'Feature 2'],
    services: ['Service 1', 'Service 2']
}
```

3. Add the building to the SVG map in `map.html`
4. Add a card in `locations.html`

### Changing Colors

Edit the CSS variables in `css/style.css`:

```css
:root {
    --primary-color: #your-color;
    --secondary-color: #your-color;
    /* ... other colors */
}
```

### Adding New Routes

Edit the `routes` object in `js/directions.js`:

```javascript
'from-to': {
    fromName: 'Starting Point',
    toName: 'Destination',
    distance: '500 meters',
    duration: '7 minutes',
    steps: [
        { instruction: 'Step 1', detail: 'Details', distance: '100m' },
        // ... more steps
    ]
}
```

## 🤝 Contributing

Contributions are welcome! Here's how you can help:

1. **Report Bugs:** Open an issue describing the bug
2. **Suggest Features:** Open an issue with your feature idea
3. **Submit Pull Requests:** Fork, make changes, and submit a PR

### Development Guidelines

- Follow existing code style
- Comment your code
- Test on multiple browsers
- Ensure mobile responsiveness
- Update documentation

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 👥 Authors

- **Your Team Name**
- Member 1 - Project Lead
- Member 2 - Frontend Developer
- Member 3 - UI/UX Designer
- Member 4 - JavaScript Developer
- Member 5 - QA & Documentation

## 🙏 Acknowledgments

- Font Awesome for icons
- Inspiration from modern campus navigation systems
- Web development community for best practices

## 📞 Contact

For questions or support:
- **Email:** info@campus.edu
- **Phone:** (555) 123-4567
- **Website:** [Your Website]

## 🔮 Future Enhancements

- [ ] Real-time GPS location tracking
- [ ] Progressive Web App (PWA) support
- [ ] Offline functionality
- [ ] Backend integration for dynamic content
- [ ] User accounts and favorites
- [ ] Accessibility features (wheelchair routes)
- [ ] Indoor navigation
- [ ] Event calendar integration
- [ ] Multi-language support
- [ ] Dark mode theme
- [ ] Analytics dashboard
- [ ] Mobile app versions

## 📊 Project Stats

- **Lines of Code:** ~3,500+
- **Files:** 11
- **Pages:** 6
- **Locations:** 5
- **Features:** 10+
- **Development Time:** [Your time]

---

**Made with ❤️ by [Your Team Name]**

*Last Updated: May 2026*
