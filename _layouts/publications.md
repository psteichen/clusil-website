---
layout: base
---
DEBUG
-----
Tags:
{% for tag in site.tags %}
  <h3>{{ tag[0] }}</h3>
{% endfor %}
Categories:
{% for cat in site.categories %}
  <h3>{{ cat[0] }}</h3>
{% endfor %}

<section>
  <h1>Publications</h1>
  <div class="row">
  {% assign pubs = site.posts | where_exp:"item","item.categories contains 'publication'" | sort: 'date' | reverse %}
  {% for pub in pubs %}
    <div class="col-4">
      <div class="card">
        <h2 class="card-title"><a href="{{ pub.url }}">{{ pub.title }}</a></h2>
        <h3>{{ pub.subtitle }}</h3>
        <div class="card-body">
          <p>{{ pub.teaser | markdownify }}</p>
        </div>
      </div>
    </div>
  {% endfor %}
  </div>
</section>
