# Campus Navigator - Project Guidelines & Documentation

## 📋 Project Overview

**Project Title:** Campus Navigator  
**Application Area:** GIS-based Campus Navigation System  
**Group Size:** 5 Students  
**Timeline:** 3 weeks total (1 week BRD + 2 weeks development)  
**Final Presentation:** May 17, 2026

---

## 👥 1. Group Formation & Roles

### Required Team Roles (5 Members)

#### 1. **Project Manager**
- **Responsibilities:**
  - Coordinate team activities and meetings
  - Track project timeline and milestones
  - Ensure all deliverables are submitted on time
  - Facilitate communication between team members
  - Prepare and organize presentation materials
- **Skills Needed:** Leadership, organization, communication

#### 2. **UI/UX Designer**
- **Responsibilities:**
  - Design website layout and user interface
  - Create color schemes and visual branding
  - Design responsive layouts for mobile/desktop
  - Create wireframes and mockups
  - Ensure consistent design across all pages
- **Skills Needed:** CSS, design principles, creativity

#### 3. **Frontend Developer 1**
- **Responsibilities:**
  - Write HTML structure for all pages
  - Implement navigation menu and page layouts
  - Ensure semantic HTML markup
  - Integrate CSS styles with HTML
  - Test cross-browser compatibility
- **Skills Needed:** HTML5, attention to detail

#### 4. **Frontend Developer 2 / Content Manager**
- **Responsibilities:**
  - Write and implement JavaScript functionality
  - Create interactive features (map, search, forms)
  - Implement form validation
  - Add dynamic content and animations
  - Manage website content and text
- **Skills Needed:** JavaScript, problem-solving

#### 5. **Tester / Quality Assurance**
- **Responsibilities:**
  - Test all website features and functionality
  - Check responsiveness on different devices
  - Validate HTML/CSS code
  - Document bugs and issues
  - Ensure all links and forms work correctly
- **Skills Needed:** Attention to detail, testing methodologies

### Team Contribution Rules
✅ All members must contribute equally  
✅ Every student must understand all parts of the project  
✅ Individual questions may be asked during evaluation  
✅ Active participation is mandatory for all members

---

## 📝 2. Business Requirements Document (BRD)

### BRD Template Structure

Your BRD must include the following sections:

#### **Section 1: Project Title and Description**
```
Project Title: Campus Navigator

Description:
Campus Navigator is an interactive web-based GIS application designed to help 
students, faculty, and visitors easily navigate campus facilities. The system 
provides an interactive map, location search, directions between buildings, 
and detailed information about campus facilities without requiring backend 
infrastructure or APIs.
```

#### **Section 2: Objectives**
List 3-5 clear objectives:
- Provide easy navigation for campus visitors
- Display interactive campus map with clickable buildings
- Offer direction-finding between campus locations
- Present detailed information about each facility
- Ensure mobile-friendly access for all users

#### **Section 3: Target Users**
Identify your primary users:
- **Primary Users:** New students, visitors, prospective students
- **Secondary Users:** Faculty, staff, parents
- **User Needs:** Quick location finding, directions, facility information

#### **Section 4: Scope of the System**

**In Scope:**
- Interactive campus map with 5 key locations
- Search functionality for locations
- Direction-finding between buildings
- Responsive design for mobile and desktop
- Contact form with validation
- Information pages (About, Locations, Contact)

**Out of Scope:**
- Real-time GPS tracking
- Backend database integration
- User authentication/login
- Real-time updates
- Mobile app development

#### **Section 5: List of Pages/Features**

**Required Pages (Minimum 4-6):**

1. **Home Page (index.html)**
   - Hero section with welcome message
   - Featured locations cards
   - Quick search functionality
   - Call-to-action buttons

2. **About Page (about.html)**
   - Project mission and description
   - Technologies used
   - Team information (optional)
   - Statistics/features overview

3. **Interactive Map Page (map.html)**
   - SVG-based campus map
   - Clickable building markers
   - Building details panel
   - Map legend

4. **Locations Page (locations.html)**
   - Grid of all campus locations
   - Search/filter functionality
   - Detailed location cards
   - Contact information for each location

5. **Directions Page (directions.html)**
   - From/To location selectors
   - Route calculation
   - Step-by-step directions
   - Popular routes section

6. **Contact Page (contact.html)**
   - Contact form with validation
   - Contact information cards
   - FAQ section
   - Social media links

**Key Features:**
- Responsive navigation menu with hamburger icon
- Search functionality
- Form validation (JavaScript)
- Interactive map with click events
- Dynamic content display
- Smooth animations and transitions

#### **Section 6: Site Structure (Sitemap)**

```
Campus Navigator
│
├── Home (index.html)
│   ├── Hero Section
│   ├── Featured Locations
│   └── Search Bar
│
├── About (about.html)
│   ├── Mission Statement
│   ├── Technologies
│   └── Statistics
│
├── Interactive Map (map.html)
│   ├── SVG Campus Map
│   ├── Building Markers
│   └── Details Panel
│
├── Locations (locations.html)
│   ├── Search Bar
│   ├── Location Cards
│   └── Filter Options
│
├── Directions (directions.html)
│   ├── Route Form
│   ├── Directions Display
│   └── Popular Routes
│
└── Contact (contact.html)
    ├── Contact Form
    ├── Contact Info
    └── FAQ Section
```

#### **Section 7: Technologies**

**Frontend Technologies:**
- **HTML5:** Semantic markup, structure
- **CSS3:** Styling, animations, responsive design
- **JavaScript (ES6):** Interactivity, form validation, dynamic content

**Tools & Libraries:**
- Font Awesome (icons)
- Google Fonts (typography)
- No backend or database required

**Development Environment:**
- Text Editor: VS Code, Sublime Text, or similar
- Browser: Chrome, Firefox (for testing)
- Local Server: XAMPP, Live Server, or similar

#### **Section 8: Team Roles and Responsibilities**

| Role | Name | Responsibilities | Deliverables |
|------|------|-----------------|--------------|
| Project Manager | [Name] | Coordination, timeline, documentation | BRD, presentation slides |
| UI/UX Designer | [Name] | Design, CSS, responsiveness | CSS files, design mockups |
| Frontend Developer 1 | [Name] | HTML structure, integration | HTML files |
| Frontend Developer 2 | [Name] | JavaScript, interactivity | JS files, dynamic features |
| Tester/QA | [Name] | Testing, validation, bug fixes | Test report, bug documentation |

#### **Section 9: Technical Requirements**

**Browser Compatibility:**
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

**Responsive Breakpoints:**
- Mobile: 320px - 768px
- Tablet: 769px - 1024px
- Desktop: 1025px and above

**Performance Requirements:**
- Page load time: < 3 seconds
- Smooth animations (60fps)
- Optimized images and assets

#### **Section 10: Project Timeline**

| Phase | Duration | Deliverables |
|-------|----------|--------------|
| Group Formation & BRD | Week 1 | BRD document, team roles |
| Development Phase | Week 2-3 | Complete website |
| Testing & Refinement | Week 3 | Bug fixes, optimization |
| Presentation Prep | Week 3 | Slides, demo preparation |
| Final Presentation | May 17, 2026 | Live demo, Q&A |

---

## 💻 3. Development Requirements

### Minimum Requirements Checklist

#### HTML Requirements
✅ 4-6 pages minimum  
✅ Semantic HTML5 elements (header, nav, main, section, footer)  
✅ Proper document structure (DOCTYPE, head, body)  
✅ Meta tags for responsiveness  
✅ Valid HTML (no errors)  
✅ Accessible markup (alt text, labels)

#### CSS Requirements
✅ External CSS file(s)  
✅ Responsive design (mobile-first approach)  
✅ CSS Grid or Flexbox for layouts  
✅ Media queries for different screen sizes  
✅ Consistent color scheme and typography  
✅ Hover effects and transitions  
✅ No inline styles (use classes)

#### JavaScript Requirements
✅ External JS file(s)  
✅ Form validation (name, email, message)  
✅ Interactive map functionality  
✅ Search/filter functionality  
✅ Dynamic content display  
✅ Event listeners (click, submit, etc.)  
✅ DOM manipulation  
✅ No errors in console

### Folder Structure

```
cns/
│
├── index.html
├── about.html
├── map.html
├── locations.html
├── directions.html
├── contact.html
│
├── css/
│   └── style.css
│
├── js/
│   ├── main.js
│   ├── map.js
│   ├── search.js
│   ├── directions.js
│   └── contact.js
│
├── images/
│   └── (optional images)
│
└── README.md
```

---

## 🎤 4. Presentation & Demonstration

### Presentation Structure (15-20 minutes)

#### Part 1: Introduction (3 minutes)
- **Project Manager presents:**
  - Project title and overview
  - Team member introductions and roles
  - Project objectives

#### Part 2: BRD Overview (3 minutes)
- **Project Manager presents:**
  - Target users and scope
  - Site structure and features
  - Technologies used

#### Part 3: Design Walkthrough (3 minutes)
- **UI/UX Designer presents:**
  - Design decisions (colors, fonts, layout)
  - Responsive design approach
  - User experience considerations

#### Part 4: Live Demonstration (5 minutes)
- **Frontend Developers demonstrate:**
  - Navigate through all pages
  - Show interactive map functionality
  - Demonstrate search feature
  - Show directions functionality
  - Test contact form validation
  - Show responsive design (resize browser)

#### Part 5: Technical Explanation (4 minutes)
- **Frontend Developer 1:**
  - Explain HTML structure
  - Show semantic markup examples
  
- **Frontend Developer 2:**
  - Explain JavaScript functionality
  - Show code examples (map interaction, form validation)
  
- **UI/UX Designer:**
  - Explain CSS techniques
  - Show responsive design implementation

#### Part 6: Testing & Quality (2 minutes)
- **Tester presents:**
  - Testing approach
  - Issues found and resolved
  - Browser compatibility results

#### Part 7: Q&A (5 minutes)
- **All members participate:**
  - Answer questions from evaluators
  - Explain individual contributions

### Presentation Tips
✅ Practice your presentation multiple times  
✅ Prepare backup (screenshots) in case of technical issues  
✅ Speak clearly and confidently  
✅ Make eye contact with evaluators  
✅ Be ready to answer questions about any part of the project  
✅ Show enthusiasm for your work

---

## 📊 5. Evaluation Criteria

### Grading Breakdown

| Criteria | Weight | Description |
|----------|--------|-------------|
| **BRD Quality** | 15% | Completeness, clarity, professionalism |
| **Design & UX** | 20% | Visual appeal, usability, consistency |
| **HTML Structure** | 15% | Semantic markup, organization, validity |
| **CSS & Responsiveness** | 20% | Styling quality, mobile-friendly, animations |
| **JavaScript Functionality** | 20% | Interactivity, validation, error-free |
| **Teamwork** | 5% | Equal contribution, collaboration |
| **Presentation** | 5% | Clarity, professionalism, participation |

### What Evaluators Look For

#### BRD Quality (15%)
- Clear and detailed documentation
- Professional formatting
- Realistic scope and objectives
- Well-defined team roles

#### Design & User Experience (20%)
- Attractive and modern design
- Intuitive navigation
- Consistent branding
- Good use of colors and typography
- Smooth user flow

#### HTML Structure (15%)
- Proper semantic elements
- Clean and organized code
- Valid HTML (no errors)
- Accessible markup
- Proper indentation

#### CSS & Responsiveness (20%)
- Professional styling
- Mobile-first approach
- Smooth transitions and animations
- Consistent spacing and alignment
- Works on all screen sizes

#### JavaScript Functionality (20%)
- All features work correctly
- Form validation is thorough
- Interactive elements respond properly
- No console errors
- Clean and readable code

#### Teamwork (5%)
- All members contributed
- Good collaboration
- Clear role distribution
- Everyone understands the project

#### Presentation (5%)
- Clear communication
- Professional delivery
- All members participate
- Good time management
- Confident answers to questions

---

## 📦 6. Submission Requirements

### What to Submit

#### 1. BRD Document
- **Format:** PDF or Word document
- **Filename:** `GroupX_BRD_CampusNavigator.pdf`
- **Content:** All sections from BRD template
- **Due:** End of Week 1

#### 2. Source Code
- **Format:** Zipped folder
- **Filename:** `GroupX_CampusNavigator_SourceCode.zip`
- **Contents:**
  - All HTML files
  - CSS folder with stylesheets
  - JS folder with JavaScript files
  - Images folder (if applicable)
  - README.md file

#### 3. README.md File
Include in your source code:
```markdown
# Campus Navigator

## Group Members
1. [Name] - Project Manager
2. [Name] - UI/UX Designer
3. [Name] - Frontend Developer 1
4. [Name] - Frontend Developer 2
5. [Name] - Tester

## How to Run
1. Extract the zip file
2. Open XAMPP and start Apache
3. Copy folder to C:\xampp\htdocs\
4. Open browser and go to: http://localhost/cns/index.html

## Technologies Used
- HTML5
- CSS3
- JavaScript (ES6)
- Font Awesome
- Google Fonts

## Features
- Interactive campus map
- Location search
- Direction finding
- Contact form with validation
- Fully responsive design

## Browser Compatibility
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
```

#### 4. Presentation Slides (Optional but Recommended)
- **Format:** PowerPoint or PDF
- **Filename:** `GroupX_Presentation.pptx`
- **Content:**
  - Title slide with team members
  - Project overview
  - Key features
  - Technical highlights
  - Demo screenshots
  - Thank you slide

---

## ⚠️ 7. Important Rules & Guidelines

### Academic Integrity
❌ **Plagiarism is strictly prohibited**
- Do not copy code from other groups
- Do not use complete templates from the internet
- You can use libraries (Font Awesome, etc.) but core code must be original
- Cite any external resources used

✅ **What is allowed:**
- Using CSS frameworks (Bootstrap, etc.) - but customize them
- Using icon libraries (Font Awesome)
- Using Google Fonts
- Learning from tutorials (but write your own code)
- Getting help from instructors

### Penalties
- **Plagiarism:** Zero grade for the project
- **Late submission:** 10% deduction per day
- **Incomplete work:** Proportional grade reduction
- **Non-participation:** Individual grade reduction

### Best Practices
✅ Use version control (Git) to track changes  
✅ Comment your code for clarity  
✅ Test on multiple browsers and devices  
✅ Keep backups of your work  
✅ Start early, don't wait until the last minute  
✅ Communicate regularly with your team  
✅ Ask for help when needed

---

## 📅 8. Project Timeline

### Week 1: Planning & BRD (Days 1-7)
- **Day 1-2:** Form groups, assign roles
- **Day 3-4:** Brainstorm project ideas, create BRD draft
- **Day 5-6:** Finalize BRD, create wireframes
- **Day 7:** Submit BRD, wait for approval

### Week 2: Development Phase 1 (Days 8-14)
- **Day 8-9:** Set up project structure, create HTML pages
- **Day 10-11:** Implement CSS styling, responsive design
- **Day 12-13:** Add JavaScript functionality
- **Day 14:** First round of testing, bug fixes

### Week 3: Development Phase 2 & Presentation (Days 15-21)
- **Day 15-16:** Complete remaining features
- **Day 17-18:** Comprehensive testing, refinement
- **Day 19-20:** Prepare presentation, practice demo
- **Day 21 (May 17):** Final presentation and demonstration

---

## 🎯 9. Success Tips

### For Project Managers
- Create a shared document for team communication
- Set up regular team meetings (at least 2 per week)
- Track progress using a simple checklist
- Ensure everyone knows their deadlines

### For UI/UX Designers
- Start with wireframes before coding
- Choose a consistent color palette (3-5 colors)
- Use a design tool (Figma, Adobe XD) for mockups
- Test your design on different screen sizes

### For Frontend Developers
- Write clean, well-commented code
- Use semantic HTML elements
- Test your code frequently
- Use browser developer tools for debugging

### For Testers
- Create a testing checklist
- Test on multiple browsers
- Check all links and forms
- Document bugs clearly with screenshots

### For Everyone
- Communicate openly with your team
- Don't be afraid to ask questions
- Learn from each other
- Take pride in your work
- Have fun with the project!

---

## 📞 10. Getting Help

### Resources
- **Instructor Office Hours:** [Schedule]
- **Online Resources:**
  - MDN Web Docs: https://developer.mozilla.org
  - W3Schools: https://www.w3schools.com
  - CSS-Tricks: https://css-tricks.com
  - Stack Overflow: https://stackoverflow.com

### Common Issues & Solutions
- **CSS not loading:** Check file path, clear browser cache
- **JavaScript not working:** Check console for errors
- **Responsive design issues:** Use browser dev tools, test media queries
- **Form validation not working:** Check event listeners, console errors

---

## ✅ Final Checklist Before Submission

### BRD Checklist
- [ ] All 10 sections completed
- [ ] Team roles clearly defined
- [ ] Sitemap included
- [ ] Timeline realistic
- [ ] Professional formatting
- [ ] Proofread for errors

### Development Checklist
- [ ] All 4-6 pages completed
- [ ] Navigation menu works on all pages
- [ ] Responsive design tested
- [ ] JavaScript features working
- [ ] Forms validate correctly
- [ ] No console errors
- [ ] Code is commented
- [ ] Folder structure organized
- [ ] README.md included

### Presentation Checklist
- [ ] Slides prepared
- [ ] Demo practiced
- [ ] All members know their parts
- [ ] Backup plan ready
- [ ] Questions anticipated
- [ ] Time limit respected (15-20 min)

---

**Good luck with your Campus Navigator project! 🚀**

*Remember: The key to success is teamwork, communication, and starting early!*
