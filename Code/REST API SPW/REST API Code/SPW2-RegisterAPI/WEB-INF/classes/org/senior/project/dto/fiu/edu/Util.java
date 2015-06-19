package org.senior.project.dto.fiu.edu;

import java.io.IOException;
import java.util.Properties;

import org.senior.project.properties.fiu.edu.PropertyLoader;

public class Util {

	
	public static String GetProperty(String property)
	{
		Properties config = new Properties();			
		
		try {
			config.load(PropertyLoader.class.getResourceAsStream("config.properties"));
		} catch (IOException e) {			
			e.printStackTrace();
			return ""; 
		}
		
		return config.getProperty(property);
		

	}

}
