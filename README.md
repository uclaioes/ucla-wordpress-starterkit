# UCLA 2020 WordPress Theme
The UCLA 2020 WordPress theme is a parent theme forked from the default WordPress TwentyTwenty Theme

## Themes
- [UCLA 2020 Theme](https://github.com/ucla-ux/ucla-wordpress-starterkit.git)
- [TwentyTwenty](https://wordpress.org/themes/twentytwenty/)

## Plugins
- [Advanced Custom Fields Pro](https://www.advancedcustomfields.com)
- [Admin Columns Pro](https://www.admincolumns.com/)
- [WordFence](https://www.wordfence.com/)
- [SVG Support](https://wordpress.org/plugins/svg-support/)
- [Query Monitor](https://wordpress.org/plugins/query-monitor/)
- [Classic Editor](https://wordpress.org/plugins/classic-editor/)
- [WP Migrate DB Pro](https://deliciousbrains.com/wp-migrate-db-pro/)
- [WordFence](https://www.wordfence.com/)


---
## Install Instructions

1. Download, copy or fork this Git template to your Git account. 
1. Download template and install theme into your WordPress site
1. Install theme into your WordPress Site
1. Activate Theme
1. Compile scss file to overwrite style.css in theme

---
# For Developers

## Preprocessors
- [Scss](https://sass-lang.com/)
- [node and npm](https://nodejs.org/en/)

### Stylelint plugins (TBD)
- [Stylelint](https://stylelint.io/)
- [stylelint-config-recommended](https://github.com/stylelint/stylelint-config-recommended)
- [stylelint-config-wordpress](https://github.com/WordPress-Coding-Standards/stylelint-config-wordpress)
- [stylelint-order](https://github.com/hudochenkov/stylelint-order)
- [stylelint-a11y](https://github.com/YozhikM/stylelint-a11y)

## Component libraries (TBD)
- [Fractal](https://fractal.build/)

## Editors
- [CodeKit](https://codekitapp.com/) or [Prepos](https://prepros.io/)
- [VS Code](https://code.visualstudio.com/) or [Atom.io](https://atom.io/)


## Install Instructions (TBD)

`npm install`

## Contribute
Post issues and submit pull requests to [GitHub](https://github.com/ucla-ux/ucla-wordpress-starterkit).

## Global naming conventions.

- Adopts `ucla-` global prefix on SCSS variables and CSS Custom Properties. 
- Customize for your department with naming convention pattern `ucla-deptname-`
- Advanced custom fields also used naming convention. 

## Content types

### People

- [ACF Field Group export](acf-export-ucla-p-content-type.json) use to import into WordPress (requires ACF plugin). 
- Field names choice based on microformat taxonomy for a person.

1. First name, `ucla-p-given-name`
1. Middle name, `ucla-p-additional-name`
1. Last name, `ucla-p-family-name`
1. Honorific prefix `ucla-p-honorific-prefix`
1. Honorific suffix `ucla-p-honorific-suffix`
1. Photo `ucla-p-photo`
1. Job Title `ucla-p-job-title`
1. Department `ucla-p-org`
1. Telephone `ucla-p-tel`
1. Email `ucla-p-email`
1. Address `ucla-p-adr`
1. Campus Mailcode `ucla-p-campus-mailcode`
1. Short summary `ucla-p-summary`
1. Links `ucla-p-links`
  1. Site `ucla-p-link-site`
  1. Site URL `ucla-p-link-url`
  1. Site Name `ucla-p-link-name`
1. Interests 
  1. Knows About `ucla-p-knows-about`

## To Do

1. Move custom post types to a plugin
1. Rest API for custom content types
1. Move to do list to Github Issues

## Issues and suggestions
- Use Github Issues.
