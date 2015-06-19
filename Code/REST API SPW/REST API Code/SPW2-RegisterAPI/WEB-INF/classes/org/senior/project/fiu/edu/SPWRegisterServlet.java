package org.senior.project.fiu.edu;

import java.util.Date;
import java.util.Timer;
import java.util.TimerTask;

import javax.servlet.ServletConfig;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;

import org.senior.project.dto.fiu.edu.DBConnection;

public class SPWRegisterServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
   public SPWRegisterServlet() {
        super();
    }

	public void init(ServletConfig config) throws ServletException {
		TimerTask task = new TimerTask() {
			
			@Override
			public void run() {
				try {
					//System.out.println("Run");
					DBConnection d = new DBConnection();
					if (d.connect() == 0 )
					{
						d.updateStatusAll() ;
						d.createNewProfiles();
						d.disconnect();
					}
				} catch (Exception e) {
					e.printStackTrace();
				}				 
			}
		};
		Timer timer = new Timer();
		timer.schedule(task, new Date(), 60000);	
                
		
		//60000 	1 min
		//180000 	3 min
		//300000	5 min
		//43200000  12 hrs
	}	

}
