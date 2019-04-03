
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
    colors = {$plugin.tx_rkwgraphs.settings.colors}
    labels = {$plugin.tx_rkwgraphs.settings.labels}
    series = {$plugin.tx_rkwgraphs.settings.series}
    caption {
      label = {$plugin.tx_rkwgraphs.settings.caption.label}
      text = {$plugin.tx_rkwgraphs.settings.caption.text}
    }
    donut = {$plugin.tx_rkwgraphs.settings.donut}
    bars {
      stacked = {$plugin.tx_rkwgraphs.settings.bars.stacked}
      horizontal = {$plugin.tx_rkwgraphs.settings.bars.horizontal}
    }
  }
}


// include JS
page.includeJSFooterlibs.txRkwGraphsApexCharts = EXT:rkw_graphs/Resources/Public/Js/ApexCharts-v3.2.2.min.js
page.includeCSS.txRkwGraphsCharts = EXT:rkw_graphs/Resources/Public/Css/Charts.css


plugin.tx_rkwgraphs._CSS_DEFAULT_STYLE (

)
