
plugin.tx_rkwgraphs {
  view {
    # cat=plugin.tx_rkwgraphs/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:rkw_graphs/Resources/Private/Templates/
    # cat=plugin.tx_rkwgraphs/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:rkw_graphs/Resources/Private/Partials/
    # cat=plugin.tx_rkwgraphs/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:rkw_graphs/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_rkwgraphs//a; type=string; label=Default storage PID
    storagePid =
  }
  settings {
    title = Titel
    xaxis {
      label = Überschrift x-Achse
    }
    yaxis {
      label = Überschrift y-Achse
    }
    colors = #000000
    labels = gut|mittel|schlecht
    series = 10|15|20
    caption {
      label = Bildunterschrift (Label)
      text = Bildunterschrift (Text)
    }
    bars {
      yaxis2 {
        show = false
        label = Überschrift 2. y-Achse
      }
      stacked = false
      horizontal = false
    }
    donut {
    }
    legend {
      show = true
    }
  }
}