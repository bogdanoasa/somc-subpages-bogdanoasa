# SOMC Subpages

* Contributors: Oasa Bogdan-Valentin
* Tags: pages,hierarchy,tree,sortable,widget,shortcode

SOMC Subpages displays children of the current visited page via widget or shortcode.

## Description

This Plugin was created as a request from SonyMobile for the Frontend Developer position.

## Installation

### Using The WordPress Dashboard

1. Navigate to the 'Add New' Plugin Dashboard
2. Select `somc-subpages-bogdanoasa.zip` from your computer
3. Upload
4. Activate the plugin on the WordPress Plugin Dashboard

### Using FTP

1. Extract `somc-subpages-bogdanoasa.zip` to your computer
2. Upload the `somc-subpages` directory to your `wp-content/plugins` directory
3. Activate the plugin on the WordPress Plugins Dashboard

## Usage

### Shortcode
1. Write [somc_subpages] in your page where you want to display the list of subpages
2. You can add the following attributes:
   - title=""
   - sort="" (ASC or DESC as accepted values, default is ASC)
3. Example: [somc_subpages title="Subpages" sort="DESC"]

### Widget
1. Navigate to Appearance -> Widgets in Wordpress Dashboard
2. Select 'SOMC Subpages' from the list of available widget to the desired sidebar
3. Available options: 'title' (default is "Subpages") and 'sort' (default is "ASC")  

## License