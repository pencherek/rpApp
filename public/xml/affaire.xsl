<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" encoding="utf-8" indent="yes" />
    <xsl:template match="/">
        <html lang="en">
        <head>
            <meta charset="UTF-8"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <style>
					table {
					font-family: arial, sans-serif;
					border-collapse:
					collapse;
					width:
					100%;
					}
					td, th {
					border: 1px solid #dddddd;
					text-align:
					left;
					padding: 8px;
					}
					tr:nth-child(even) {
					background-color: #dddddd;
					}
                </style>
            <title>Document</title>
        </head>
        <body>
            <xsl:apply-templates select="affaire"/>
        </body>
        </html>
    </xsl:template>
    <xsl:template match="affaire">
        <xsl:apply-templates select="data"/>
        <xsl:apply-templates select="documents"/>
    </xsl:template>
    <xsl:template match="data">
        <div>
            <h2><xsl:value-of select="titre"/></h2>
            <table class="data">
                <tr>
                    <td>id</td>
                    <td><xsl:value-of select="id"/></td>
                </tr>
                <tr>
                    <td>auteur</td>
                    <td><xsl:value-of select="auteur"/></td>
                </tr>
                <tr>
                    <td>date</td>
                    <td><xsl:value-of select="date"/></td>
                    <td>cosignataires</td>
                    <td>resume</td>
                </tr>
                <tr>
                    <td>nature</td>
                    <td><xsl:value-of select="nature"/></td>
                    <td><xsl:value-of select="cosignataires"/></td>
                    <td><xsl:value-of select="resume"/></td>
                </tr>
                <tr>
                    <td>cosignataires</td>
                    <td><xsl:value-of select="cosignataires"/></td>
                </tr>
                <tr>
                    <td>resume</td>
                    <td><xsl:value-of select="resume"/></td>
                </tr>
            </table>
        </div>
    </xsl:template>
    <xsl:template match="documents">
        <div>
            <table class="data">
                <xsl:for-each select="document">
                    <tr>
                        <xsl:attribute name="id">
                            <xsl:value-of select="@idDoc"/>
                        </xsl:attribute>
                        <td><xsl:value-of select="nature"/> : </td>
                        <td colspan="5">
                        <a>
                            <xsl:attribute name="href">
                                <xsl:value-of select="lien"/>
                            </xsl:attribute>
                            <xsl:value-of select="libelle"/>
                        </a>
                        </td>
                    </tr>
                </xsl:for-each>
            </table>
        </div>
    </xsl:template>
</xsl:stylesheet>