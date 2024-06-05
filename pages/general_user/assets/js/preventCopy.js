
        document.addEventListener('keydown', function(event) {
            
            if ((event.ctrlKey || event.metaKey) && (event.key === 'c'|| event.key === 
            'p' || event.key === 's') || event.shiftKey) {
               
                event.preventDefault();
                
                alert('Copy,Print and Snapshot is disabled on this page.');
            
            }
        }
        
        );
