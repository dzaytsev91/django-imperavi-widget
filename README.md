Django Imperavi editor
======================
Supported versions
------------
Supports Django >=1.8 and Python 2/3

Installation
------------
```
pip install git+https://github.com/dzaytsev91/django-imperavi-widget.git
```

* Add ``imperavi`` to your ``INSTALLED_APPS`` setting.

* Add imperavi URL include to your project's ``urls.py`` file::

```
url(r'^imperavi/', include('imperavi.urls')),
```

Example
-----
```
cd example/
python manage.py migrate
./manage.py shell -c "from django.contrib.auth.models import User; User.objects.create_superuser('admin', 'admin@example.com', 'admin')"
python manage.py runserver
```
Then go to [http://127.0.0.1:8000/admin/](127.0.0.1:8000/admin/) and try to create post instance

login: admin 
password: admin


Usage
-----

The quickest way to add rich text editing capabilities to your admin is to use the included ``ImperaviAdmin`` class. For example::

    from .models import Category
    from imperavi.admin import ImperaviAdmin

    class CategotyAdmin(ImperaviAdmin):
        pass

    admin.site.register(Category, CategotyAdmin)

If you want to use it with inline admin models you need to use ``ImperaviStackedInlineAdmin`` class::

    from .models import Post
    from imperavi.admin import ImperaviStackedInlineAdmin

    class PostInline(ImperaviStackedInlineAdmin):
        model = Post
        extra = 1

Custom settings
---------------

Add a ``IMPERAVI_CUSTOM_SETTINGS`` variable to your ``settings.py`` with custom config::

    IMPERAVI_CUSTOM_SETTINGS = {
        'resize': true
    }

Full list of settings is here.
[http://redactorjs.com/docs/settings/](ttp://redactorjs.com/docs/settings/)

Media URL
---------

You can also customize the URL that django-imperavi-widget will look for the Editor media at by adding ``IMPERAVI_UPLOAD_PATH`` to your ``settings.py`` file like this::

    IMPERAVI_UPLOAD_PATH = 'imperavi-uploads/'

The default value is ``'imperavi/'``.


Unique images per model
-----------------------

If you want to serve unique media content for specific model you can add ``unique_media = True`` to your admin class::

    from .models import Category
    from imperavi.admin import ImperaviAdmin

    class CategotyAdmin(ImperaviAdmin):
        unique_media = True

    admin.site.register(Category, CategotyAdmin)
