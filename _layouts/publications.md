---
layout: base
---

<div class="container pt-4" id="events">
  <section class="section">
    <h1 class="section-heading"><i class="big-red">/</i><span class="align-middle">{{ page.title }}</span></h1>
    <div class="row mb-3 flex-center">
      {% assign pubs = site.posts | where_exp:"item","item.categories contains 'publication'" %}
      {% for p in pubs reversed %}
      <div class="col-md-4">
        <div class="card p-2">
          <!-- Card image -->
          <a href="{{ p.url }}">
          <img class="card-img-top" src="{{ p.image }}">
          </a>
          <!-- Card content -->
          <div class="card-body">
            <!-- Title -->
            <a href="{{ p.url }}" class="lead">
            <h4 class="card-title">{{ p.title }}</h4>
            </a>
            <!-- Text -->
            <p class="card-text">{{ p.excerpt }}</p>
            <!-- Button -->
          </div>
        </div>
      </div>
      {% endfor %}
    </div>
  </section>
</div>

