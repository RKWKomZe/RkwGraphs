
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
    unit = %
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
      offsetX =
    }
    donut =
    candlesticks {
      series = TEXT
      series.value (
      1|6631.81|6650.5|6623.04|6633.33
      2|6632.01|6643.59|6620|6630.11
      3|6630.71|6648.95|6623.34|6635.65
      4|6635.65|6651|6629.67|6638.24
      5|6638.24|6640|6620|6624.47
      6|6624.53|6636.03|6621.68|6624.31
      7|6624.61|6632.2|6617|6626.02
      8|6627|6627.62|6584.22|6603.02
      9|6605|6608.03|6598.95|6604.01
      10|6604.5|6614.4|6602.26|6608.02
      )
    }
    legend {
      show = true
    }
  }
}