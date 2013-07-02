# viewLOD

viewLOD emulates a Linked Data browser or a human browser (e.g., Firefox, Chrome, etc.) and returns the appropriate representation of the specified LOD resource.

Written as a helper app for easyLOD (https://github.com/mjordan/easyLOD) but can be used independently of it.

Distributed under the MIT License, http://opensource.org/licenses/MIT.

## Installation

Unzip the distribution, put it somewhere in your web server's document root. The only dependency is PHP 5.3 or higher. Test it by going to the root of the viewLOD directory in your browser (e.g., http://localhost/viewLOD/).

## Usage

To use viewLOD, simply enter the resource URI into the 'Resource URI' field in the form, choose whether you want to emulate a LOD (Linked Open Data) browser or a human browser. Hitting the 'Get it' button will return raw XML or HTML representation.

## Thanks

Thanks to both of the following open source libraries, which are bundled with viewLOD.

SyntaxHighlighter (http://alexgorbatchev.com/SyntaxHighlighter/) for making it easy to display XML and HTML markup so that it looks good.

Slim (http://www.slimframework.com/) for making it dead easy to create a web app.



