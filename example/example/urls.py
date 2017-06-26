from django.conf.urls import  include, url
from django.contrib import admin
from django.conf import settings
from django.conf.urls.static import static
from django.views.generic import ListView
from django.views.generic.detail import DetailView

from posts.models import Category, Post

admin.autodiscover()

urlpatterns = [
    url(r'^admin/', include(admin.site.urls)),
    url(r'^imperavi/', include('imperavi.urls')),
    url(r'^$', ListView.as_view(model=Category), name="home"),
    url(r'^post/(?P<pk>[\d]*)$', DetailView.as_view(model=Post),
        name="post-detail"),
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
