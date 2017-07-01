from setuptools import setup, find_packages

setup(
    name="django-imperavi-widget",
    version="0.0.3",
    author="Zaytsev Dmitriy",
    author_email="zaytsev_dmitriy@aol.com",
    packages=find_packages(),
    include_package_data=True,
    description="A django admin widget to render a \
        text field as beautiful Imperavi WYSIWYG editor http://redactorjs.com/",
    long_description=open('README.md', 'r').read(),
    license="MIT License",
    keywords="django admin imperavi widget",
    platforms=['any'],
    install_requires=[
        "sorl-thumbnail >= 11.12",
        "pillow >= 4.1.1",
    ],
    url="https://github.com/dzaytsev91/django-imperavi-widget",
)
