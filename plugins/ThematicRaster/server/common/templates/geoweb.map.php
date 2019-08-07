 MAP
  EXTENT -75.9008145363408 19.85 -73.9491854636591 21.15
  FONTSET "conf.lst"
  IMAGECOLOR 255 255 255
  IMAGETYPE png
  INTERLACE TRUE
  SYMBOLSET "symbol.sym"
  SHAPEPATH "./data/gdal"
  SIZE 640 480
  STATUS ON
  TRANSPARENT FALSE
  UNITS DD
  NAME "GEOWEB_GIS"

  OUTPUTFORMAT
    NAME "png"
    MIMETYPE "image/png"
    DRIVER "GD/PNG"
    EXTENSION "png"
    IMAGEMODE "RGBA"
    TRANSPARENT FALSE
    FORMATOPTION "INTERLACE=ON"
  END

  OUTPUTFORMAT
    NAME "jpeg"
    MIMETYPE "image/jpeg"
    DRIVER "GD/JPEG"
    EXTENSION "jpg"
    IMAGEMODE "RGB"
    TRANSPARENT FALSE
    FORMATOPTION "INTERLACE=ON"
  END

  OUTPUTFORMAT
    NAME "gif"
    MIMETYPE "image/gif"
    DRIVER "GD/GIF"
    EXTENSION "gif"
    IMAGEMODE "PC256"
    TRANSPARENT FALSE
    FORMATOPTION "INTERLACE=ON"
  END

  OUTPUTFORMAT
    NAME "wbmp"
    MIMETYPE "image/wbmp"
    DRIVER "GD/WBMP"
    EXTENSION "wbmp"
    IMAGEMODE "PC256"
    TRANSPARENT FALSE
    FORMATOPTION "INTERLACE=ON"
  END

  OUTPUTFORMAT
    NAME "GTiff"
    MIMETYPE "image/tiff"
    DRIVER "GDAL/GTiff"
    EXTENSION "tif"
    IMAGEMODE "RGB"
    TRANSPARENT FALSE
    FORMATOPTION "INTERLACE=ON"
  END

  SYMBOL
    NAME "circle_pto"
    TYPE ELLIPSE
    FILLED TRUE
    POINTS
      1 1
    END
  END

  SYMBOL
    NAME "psiFont"
    TYPE TRUETYPE
    ANTIALIAS TRUE
    CHARACTER "&#185;"
    GAP 10
    FONT "misc"
    POSITION CC
  END

  SYMBOL
    NAME "circle"
    TYPE ELLIPSE
    FILLED TRUE
    POINTS
      1 1
    END
  END

  PROJECTION
    "init=epsg:4267"
  END
  LEGEND
    IMAGECOLOR 255 255 255
    KEYSIZE 18 16
    KEYSPACING 5 5
    LABEL
      SIZE MEDIUM
      TYPE BITMAP
      BUFFER 0
      COLOR 0 0 89
      FORCE FALSE
      MINDISTANCE -1
      MINFEATURESIZE -1
      OFFSET 0 0
      PARTIALS TRUE
    END
    POSITION LL
    STATUS OFF
  END

  QUERYMAP
    COLOR 255 255 0
    SIZE -1 -1
    STATUS OFF
    STYLE HILITE
  END

  REFERENCE
    COLOR -1 -1 -1
    EXTENT -88.8709 15.3867 -68.9623 26.7588
    IMAGE "../images/keymap.png"
    OUTLINECOLOR 255 0 0
    SIZE 150 84
    STATUS OFF
      MARKER 0
      MARKERSIZE 0
      MINBOXSIZE 3
      MAXBOXSIZE 0
  END

 

  WEB
    IMAGEPATH "/var/www/ms_tmp/"
    IMAGEURL "/ms_tmp/"
    QUERYFORMAT text/html
    LEGENDFORMAT text/html
    BROWSEFORMAT text/html
  END

  LAYER
    CLASSITEM "name"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mod_miscelaneas.world"
    DUMP TRUE
    GROUP "Miscelaneas"
    LABELITEM "name"
    MAXSCALEDENOM 1e+10
    METADATA
      "wms_title"	"Mundo"
    END
    MINSCALEDENOM 500000
    NAME "mundo"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    OPACITY 60
    TYPE POLYGON
    UNITS METERS
    CLASS
      NAME "Mundo"
      LABEL
        ANGLE 0.000000
        ANTIALIAS TRUE
        FONT "Vera"
        MAXSIZE 256
        MINSIZE 4
        SIZE 10
        TYPE TRUETYPE
        BUFFER 0
        COLOR 0 0 0
        FORCE FALSE
        MINDISTANCE -1
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION CC
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 240 240 160
        OUTLINECOLOR 0 0 0
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
	  NAME "viewshade"
          STATUS ON
          TEMPLATE "base"
          TILEINDEX "srtm_index.shp"
          TILEITEM "location"
          CLASSITEM "[pixel]"
          TRANSPARENCY 70
          METADATA
               "wms_title" "viewshade"
               "wms_srs" "EPSG:4267"
          END
          TYPE RASTER          
          PROJECTION
               'proj=longlat'
               'ellps=clrk66'
               'datum=NAD27'
               'no_defs'
          END
          
          UNITS DD
          MINSCALEDENOM  1
          MAXSCALEDENOM  10000000 
          #EXTENT  -88.870862 15.386740 -68.962302 26.758788
          <?php echo $GLOBALS['classes']."\n" ?>  
  END

  LAYER
    GROUP "Mapa_250000"
    MAXSCALEDENOM 1.5e+06
    NAME "sombra"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TILEINDEX "shd_index.shp"
    TILEITEM "location"
    OPACITY 80
    TYPE RASTER
    UNITS METERS
    CLASS
      NAME "Sombra"
      EXPRESSION ([pixel] != 195)
      STYLE
        ANGLE 360
        COLOR 90 90 90
        SYMBOL 0
        WIDTH 1
        RANGEITEM "[pixel]"
        COLORRANGE 0 0 0  255 255 255
        DATARANGE 0 255
      END
    END
  END

  LAYER
    CLASSITEM "[pixel]"
    GROUP "Mapa_250000"
    MAXSCALEDENOM 1e+07
    MINSCALEDENOM 1
    NAME "relieve"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TILEINDEX "srtm_index.shp"
    TILEITEM "location"
    OPACITY 40
    TYPE RASTER
    UNITS METERS
    CLASS
      NAME "rango_0-70"
      EXPRESSION ([pixel] > 0 AND [pixel] <= 70)
      STYLE
        ANGLE 360
        COLOR 50 126 0
        SYMBOL 0
        WIDTH 1
        RANGEITEM "[pixel]"
        COLORRANGE 0 50 0  50 126 0
        DATARANGE 0 70
      END
    END
    CLASS
      NAME "rango_70-150"
      EXPRESSION ([pixel] > 70 AND [pixel] <= 150)
      STYLE
        ANGLE 360
        COLOR 140 140 0
        SYMBOL 0
        WIDTH 1
        RANGEITEM "[pixel]"
        COLORRANGE 50 126 0  140 140 0
        DATARANGE 70 150
      END
    END
    CLASS
      NAME "rango_150-2000"
      EXPRESSION ([pixel] > 150 AND [pixel] <= 2000)
      STYLE
        ANGLE 360
        COLOR 90 0 0
        SYMBOL 0
        WIDTH 1
        RANGEITEM "[pixel]"
        COLORRANGE 140 140 0  90 0 0
        DATARANGE 150 2000
      END
    END
  END

  LAYER
    GROUP "Mapa_250000"
    MAXSCALEDENOM 500000
    NAME "contorno"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TILEINDEX "cont_index.shp"
    TILEITEM "location"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "Contorno"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 10 0 0
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "codprov"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.municipios_r"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 1e+07
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 300000
    NAME "provincias_r"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    OPACITY 20
    TYPE POLYGON
    UNITS METERS
    CLASS
      NAME "Pinar del R&iacute;o"
      EXPRESSION "01"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 244 232 53
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "La Habana"
      EXPRESSION "02"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 167 228 142
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Ciudad de La Habana"
      EXPRESSION "03"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 255 149 227
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Matanzas"
      EXPRESSION "04"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 190 231 257
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Villa Clara"
      EXPRESSION "05"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 109 239 149
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Cienfuegos"
      EXPRESSION "06"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 223 212 174
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Sancti Sp&iacute;ritu"
      EXPRESSION "07"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 243 242 230
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Ciego de &Aacute;vila"
      EXPRESSION "08"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 212 227 20
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Camag&uuml;ey"
      EXPRESSION "09"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 53 227 32
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Las Tunas"
      EXPRESSION "10"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 254 149 224
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Holgu&iacute;n"
      EXPRESSION "11"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 241 234 220
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Granma"
      EXPRESSION "12"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 252 204 108
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Santiago de Cuba"
      EXPRESSION "13"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 216 88 177
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Guant&aacute;namo"
      EXPRESSION "14"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 233 22 16
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Isla de la Juventud"
      EXPRESSION "99"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 252 204 117
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.municipios_r"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 299999
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "municipios_r"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    OPACITY 50
    TYPE POLYGON
    UNITS METERS
    CLASS
      NAME "municipios_r"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 255 255 231
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "CTE"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.vegetacion_r"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 400000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "vegetacion_r"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    OPACITY 50
    TYPE POLYGON
    UNITS METERS
    CLASS
      NAME "Bosque de todo tipo"
      EXPRESSION "1"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 160 255 160
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Huertos, frutales y citricos"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        SYMBOL "Huertos_frutales_citricos"
        WIDTH 1
      END
    END
    CLASS
      NAME "Maleza"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 211 255 144
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "CTE"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.vial_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 2e+06
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "vial_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "Autopista"
      EXPRESSION "1"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 255 0 0
        OUTLINECOLOR 255 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Caminos"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Carretera de 1er Orden"
      EXPRESSION "3"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Carretera de 2do Orden"
      EXPRESSION "4"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 255 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Ferrocarril de via ancha"
      EXPRESSION "5"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 1
        SYMBOL "CartoLinea_Continua"
        WIDTH 1
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 5
        SYMBOL "linea_vertical_FerreaAncha"
        WIDTH 1
      END
    END
    CLASS
      NAME "Ferrocarril de via estrecha"
      EXPRESSION "6"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 1
        SYMBOL "CartoLinea_Continua"
        WIDTH 1
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 5
        SYMBOL "linea_vertical_FerreaEstrecha"
        WIDTH 1
      END
    END
    CLASS
      NAME "Terraplen"
      EXPRESSION "7"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "CTE"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.limitesterritoriales_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 299999
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "limitesterritoriales_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "Limite Municipal"
      EXPRESSION "1"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 2
        SYMBOL "limite_municipal_Discontinua"
        WIDTH 1
      END
    END
    CLASS
      NAME "Limite Provincial"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 2
        SYMBOL "limite_provincial_Discontinua"
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "CTE"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.zonabaja_r"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 350000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "zonabaja_r"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE POLYGON
    UNITS METERS
    CLASS
      NAME "Pantano Inaccesible"
      EXPRESSION "1"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 255 255
        SIZE 3
        SYMBOL "Linea-Horizontal"
        WIDTH 1
      END
    END
    CLASS
      NAME "Pantano accesible"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 255 255
        SIZE 7
        SYMBOL "Linea-Horizontal"
        WIDTH 1
      END
    END
    CLASS
      NAME "Salina"
      EXPRESSION "3"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 255 255
        SIZE 3
        SYMBOL "Linea-Horizontal"
        WIDTH 1
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 255 255
        SIZE 3
        SYMBOL "Linea-Vertical"
        WIDTH 1
      END
    END
    CLASS
      NAME "Zona salitrosa intransitable"
      EXPRESSION "4"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 255 255
        SIZE 3
        SYMBOL "Linea-Vertical"
        WIDTH 1
      END
    END
    CLASS
      NAME "Zona salitrosa transitable"
      EXPRESSION "5"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 255 255
        SIZE 7
        SYMBOL "Linea-Vertical"
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.pueblos_r"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 2e+06
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "pueblos_r"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE POLYGON
    UNITS METERS
    CLASS
      NAME "pueblos_r"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        OUTLINECOLOR 255 0 0
        SYMBOL "Pueblos"
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "CTE"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.hidrografia_r"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 500000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "hidrografia_r"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    OPACITY 50
    TYPE POLYGON
    UNITS METERS
    CLASS
      NAME "Area de desbordamiento"
      EXPRESSION "1"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 208 255 255
        OUTLINECOLOR 0 0 255
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Canal"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 208 255 255
        OUTLINECOLOR 0 0 255
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Embalse"
      EXPRESSION "3"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 208 255 255
        OUTLINECOLOR 0 0 255
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Laguna"
      EXPRESSION "4"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 208 255 255
        OUTLINECOLOR 0 0 255
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Rio"
      EXPRESSION "5"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 208 255 255
        OUTLINECOLOR 0 0 255
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.zonabaja_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 200000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "zonabaja_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "zonabaja_pl"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "CTE"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.nautica_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 250000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "nautica_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    OPACITY 80
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "Anclaje y puerto sin embarcadero"
      EXPRESSION "1"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Arrecife"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Batimetria"
      EXPRESSION "3"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 255 255
        OUTLINECOLOR 0 255 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Embarcadero"
      EXPRESSION "4"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Faro"
      EXPRESSION "5"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Puerto de mar o darsena"
      EXPRESSION "6"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "CTE"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.hidrografia_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 500000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "hidrografia_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "Acantilado sin playa"
      EXPRESSION "1"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Arroyo"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Baluarte de tierra"
      EXPRESSION "3"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Canal"
      EXPRESSION "4"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Canal en Construccion"
      EXPRESSION "5"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Conductora de Agua"
      EXPRESSION "6"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Presa"
      EXPRESSION "7"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Rio"
      EXPRESSION "8"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Zanja Seca"
      EXPRESSION "9"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.puente_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 400000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "puente_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "puente_pl"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.electrica_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 300000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "electrica_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "LineaElectrica"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SYMBOL "CartoLinea_Continua"
        WIDTH 1
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 5
        SYMBOL "RellenoElectrica"
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.costa_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 1e+07
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "costa_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "costa_pl"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CLASSITEM "CTE"
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.relieve_pl"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 100000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "relieve_pl"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "Curva Auxiliar"
      EXPRESSION "1"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 128 0 0
        OUTLINECOLOR 128 0 0
        SYMBOL "CurvaAuxiliar"
        WIDTH 1
      END
    END
    CLASS
      NAME "Curva Complementaria"
      EXPRESSION "2"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 128 0 0
        OUTLINECOLOR 128 0 0
        SYMBOL "CurvaComplementaria"
        WIDTH 1
      END
    END
    CLASS
      NAME "Curva Indice"
      EXPRESSION "3"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 128 0 0
        OUTLINECOLOR 128 0 0
        SYMBOL 0
        WIDTH 2
      END
    END
    CLASS
      NAME "Curva Principal"
      EXPRESSION "4"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 128 0 0
        OUTLINECOLOR 128 0 0
        SYMBOL 0
        WIDTH 1
      END
    END
    CLASS
      NAME "Despenadero"
      EXPRESSION "5"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 1
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.simbolos_r"
    DUMP TRUE
    GROUP "Mapa_250000"
    MAXSCALEDENOM 250000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "simbolos_r"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE POLYGON
    UNITS METERS
    CLASS
      NAME "simbolos_r"
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 0
        OUTLINECOLOR 0 0 0
        SIZE 3
        SYMBOL 0
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.rothidro_t"
    DUMP TRUE
    GROUP "Mapa_250000"
    LABELITEM "contenid"
    MAXSCALEDENOM 250000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "rothidro_t"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE POINT
    UNITS METERS
    CLASS
      NAME "rothidro_t"
      LABEL
        ANGLE [rotacion]
        ANTIALIAS TRUE
        FONT "Vera"
        MAXSIZE 256
        MINSIZE 4
        SIZE 7
        TYPE TRUETYPE
        BUFFER 0
        COLOR 0 0 255
        FORCE TRUE
        MINDISTANCE -1
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION UR
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 0 0 255
        OUTLINECOLOR 0 0 255
        SYMBOL "POINT"
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.rotplani_t"
    DUMP TRUE
    GROUP "Mapa_250000"
    LABELITEM "contenid"
    MAXSCALEDENOM 250000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "rotplani_t"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE POINT
    UNITS METERS
    CLASS
      NAME "rotplani_t"
      LABEL
        ANGLE [rotacion]
        ANTIALIAS TRUE
        FONT "Vera"
        MAXSIZE 256
        MINSIZE 4
        SIZE 7
        TYPE TRUETYPE
        BUFFER 0
        COLOR 0 0 0
        FORCE TRUE
        MINDISTANCE 5
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION UR
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 255 255 255
        OUTLINECOLOR 255 255 255
        SYMBOL "POINT"
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.rotbatime_t"
    DUMP TRUE
    GROUP "Mapa_250000"
    LABELITEM "contenid"
    MAXSCALEDENOM 50000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "rotbatime_t"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE POINT
    UNITS METERS
    CLASS
      NAME "rotbatime_t"
      LABEL
        ANGLE [rotacion]
        ANTIALIAS TRUE
        FONT "Vera"
        MAXSIZE 256
        MINSIZE 4
        SIZE 7
        TYPE TRUETYPE
        BUFFER 0
        COLOR 0 0 255
        FORCE TRUE
        MINDISTANCE 5
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION UR
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 255 255 255
        OUTLINECOLOR 255 255 255
        SIZE 3
        SYMBOL "point"
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "host=10.12.170.130 user=segsig password=segsig2008 dbname=DatosEspaciales"
    CONNECTIONTYPE POSTGIS
    DATA "wkb_geometry FROM mtd_250000.rotreli_t"
    DUMP TRUE
    GROUP "Mapa_250000"
    LABELITEM "contenid"
    MAXSCALEDENOM 50000
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "rotreli_t"
    PROCESSING "CLOSE_CONNECTION=DEFER"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TEMPLATE "base"
    TYPE POINT
    UNITS METERS
    CLASS
      NAME "rotreli_t"
      LABEL
        ANGLE [rotacion]
        ANTIALIAS TRUE
        FONT "Vera"
        MAXSIZE 256
        MINSIZE 4
        SIZE 7
        TYPE TRUETYPE
        BUFFER 0
        COLOR 128 0 0
        FORCE TRUE
        MINDISTANCE 1
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION UR
      END
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 255 255 255
        OUTLINECOLOR 255 255 255
        SIZE 1
        SYMBOL "point"
        WIDTH 1
      END
    END
  END

  LAYER
    CONNECTION "user=segsig password=segsig2008 host=10.12.170.159 dbname=DATOSSIG"
    CONNECTIONTYPE POSTGIS
    DATA ""
    MAXSCALEDENOM 7e+06
    METADATA
      "id_attribute_string"	"id|string"
      "gml_include_items"	"all"
    END
    MINSCALEDENOM 1
    NAME "localizacion"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS OFF
    TEMPLATE "ttt"
    OPACITY 50
    TYPE POLYGON
    UNITS METERS
    CLASS
      STYLE
        ANGLE 360
        ANTIALIAS TRUE
        COLOR 255 255 0
        OUTLINECOLOR 255 0 255
        SIZE 3
        SYMBOL 0
        WIDTH 5
      END
    END
  END

  LAYER
    CLASSITEM "tipo"
    CONNECTION "user=segsig password=segsig2008 host=10.12.170.159 dbname=DATOSSIG"
    CONNECTIONTYPE POSTGIS
    DATA ""
    LABELITEM "etiqueta"
    NAME "rutas_puntos"
    STATUS OFF
    TEMPLATE "t"
    OPACITY ALPHA
    TYPE POINT
    UNITS METERS
    CLASS
      NAME "inicio"
      EXPRESSION "inicio"
      LABEL
        ANGLE 0.000000
        ANTIALIAS TRUE
        FONT "ArialNegrita"
        MAXSIZE 256
        MINSIZE 4
        SIZE 10
        TYPE TRUETYPE
        BUFFER 0
        COLOR 0 0 255
        FORCE TRUE
        MINDISTANCE 10
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION CC
      END
      STYLE
        ANGLE 360
        COLOR 255 0 0
        SIZE 20
        SYMBOL "circle_pto"
        WIDTH 1
      END
      STYLE
        ANGLE 360
        COLOR 255 255 255
        SIZE 16
        SYMBOL "circle_pto"
        WIDTH 1
      END
    END
    CLASS
      NAME "intermedio"
      EXPRESSION "intermedio"
      LABEL
        ANGLE 0.000000
        ANTIALIAS TRUE
        FONT "ArialNegrita"
        MAXSIZE 256
        MINSIZE 4
        SIZE 10
        TYPE TRUETYPE
        BUFFER 0
        COLOR 0 0 255
        FORCE TRUE
        MINDISTANCE 10
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION CC
      END
      STYLE
        ANGLE 360
        COLOR 0 100 0
        SIZE 20
        SYMBOL "circle_pto"
        WIDTH 1
      END
      STYLE
        ANGLE 360
        COLOR 255 255 255
        SIZE 16
        SYMBOL "circle_pto"
        WIDTH 1
      END
    END
    CLASS
      NAME "final"
      EXPRESSION "final"
      LABEL
        ANGLE 0.000000
        ANTIALIAS TRUE
        FONT "ArialNegrita"
        MAXSIZE 256
        MINSIZE 4
        SIZE 10
        TYPE TRUETYPE
        BUFFER 0
        COLOR 0 0 255
        FORCE TRUE
        MINDISTANCE 10
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION CC
      END
      STYLE
        ANGLE 360
        COLOR 0 0 255
        SIZE 20
        SYMBOL "circle_pto"
        WIDTH 1
      END
      STYLE
        ANGLE 360
        COLOR 255 255 255
        SIZE 16
        SYMBOL "circle_pto"
        WIDTH 1
      END
    END
  END

  LAYER
    GROUP "Mapa"
    METADATA
      "DESCRIPTION"	"Grid"
    END
    NAME "grid"
    PROJECTION
      "proj=longlat"
      "ellps=clrk66"
      "datum=NAD27"
      "no_defs"
    END
    STATUS ON
    TYPE LINE
    UNITS METERS
    CLASS
      NAME "Graticula"
      LABEL
        ANGLE 0.000000
        ANTIALIAS TRUE
        FONT "Vera"
        MAXSIZE 256
        MINSIZE 4
        SIZE 8
        TYPE TRUETYPE
        BUFFER 0
        COLOR 0 0 0
        FORCE FALSE
        MINDISTANCE -1
        MINFEATURESIZE -1
        OFFSET 0 0
        OUTLINECOLOR 255 255 255
        PARTIALS TRUE
        POSITION CC
      END
      STYLE
        ANGLE 360
        COLOR 0 0 0
        SYMBOL 0
        WIDTH 1
      END
    END
      GRID
        MINSUBDIVIDE 0
        MAXSUBDIVIDE 0
        MININTERVAL 0.000000
        MAXINTERVAL 0.000000
        MINARCS 0
        MAXARCS 0
        LABELFORMAT "(null)"
      END
  END

END
 