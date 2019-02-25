<?xml version="1.0"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

 <xsl:template match="/">
     <html>
	    <body bgcolor="black">
		   <h1 style="color:purple; text-align:center;">SITEMAP</h1>
		   <div id="sitemap">
		   <table  style="border:2px solid purple; color:white;width:1000px;
		   margin:10px auto;" border="2">
		     <tr>
			     <th>Location</th>
				 <th>lastmod</th>
				 
			 </tr>
		   <xsl:for-each select="urlset/url">
		      <tr>
			  <td><xsl:value-of select="loc"/></td>
			  <td><xsl:value-of select="lastmod"/></td>
			  <td><xsl:value-of select="changefreq"/></td>
			  <td><xsl:value-of select="priority"/></td>
			  </tr>
		   
		   </xsl:for-each>
		   </table>
		</div>
		
		</body>
	 </html>
 
 
 
 </xsl:template>

</xsl:stylesheet>