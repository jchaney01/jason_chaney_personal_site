I decided to try this out on my personal site for several reasons.  It's a responsive single long page site that currently only manages/uses high-resolution retina images and all imagery on the page is retina-ready.  It's already built out and access to the site is not under any NDA.

The following is the real time log I kept as I went though my process:

I signed up for a free account and got to a page of instructions.

I load up a local repo of my site running in a vhost.

Instructions specify to add <script src="//js.imagefly.io/jasonchaney.min.js"></script> to the page but do not indicate if this is safe to load in the footer to prevent blocking.  I thought, since Imagefly is designed to speed up pages, will try it in the footer first.

The instructions say to modify the image tags.  All devs I know work locally and this is a Laravel framework so I did as instructed but now am thinking I need to remember to have all my images uploaded for this to work which is not that bad.

The image shows up fine but I'm now curious what resolution it's serving.

The display area for the image is 330x222.  The image that's being served



