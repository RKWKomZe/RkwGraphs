
plugin.tx_rkwgraphs {
  view {
    templateRootPaths.0 = EXT:rkw_graphs/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_rkwgraphs.view.templateRootPath}
    partialRootPaths.0 = EXT:rkw_graphs/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_rkwgraphs.view.partialRootPath}
    layoutRootPaths.0 = EXT:rkw_graphs/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_rkwgraphs.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_rkwgraphs.persistence.storagePid}
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
  settings {
    title = {$plugin.tx_rkwgraphs.settings.title}
    xaxis {
      label = {$plugin.tx_rkwgraphs.settings.xaxis.label}
    }
    yaxis {
      label ={$plugin.tx_rkwgraphs.settings.yaxis.label}
    }
    colors = {$plugin.tx_rkwgraphs.settings.colors}
    labels = {$plugin.tx_rkwgraphs.settings.labels}
    series = {$plugin.tx_rkwgraphs.settings.series}
    caption {
      label = {$plugin.tx_rkwgraphs.settings.caption.label}
      text = {$plugin.tx_rkwgraphs.settings.caption.text}
    }
    donut = {$plugin.tx_rkwgraphs.settings.donut}
    bars {
      yaxis2 {
        show = {$plugin.tx_rkwgraphs.settings.bars.yaxis2.show}
        label = {$plugin.tx_rkwgraphs.settings.bars.yaxis2.label}
      }
      stacked = {$plugin.tx_rkwgraphs.settings.bars.stacked}
      horizontal = {$plugin.tx_rkwgraphs.settings.bars.horizontal}
      offsetX = {$plugin.tx_rkwgraphs.settings.bars.offsetX}
    }
    # @todo: Kann dieser Wert so auch in der constants.ts übergeben werden?
    candlesticks {
      series = TEXT
      series.value (
			1|6629.81|6650.5|6623.04|6633.33
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
      # series = {$plugin.tx_rkwgraphs.settings.candlesticks.series}
    }
    legend {
      show = {$plugin.tx_rkwgraphs.settings.legend.show}
    }
  }
}


// include JS
page.includeJSFooterlibs.txRkwGraphsApexCharts = EXT:rkw_graphs/Resources/Public/Js/ApexCharts-v3.6.2.js
page.includeCSS.txRkwGraphsCharts = EXT:rkw_graphs/Resources/Public/Css/Charts.css


plugin.tx_rkwgraphs._CSS_DEFAULT_STYLE (

)
